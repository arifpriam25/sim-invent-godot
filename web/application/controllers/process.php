<?php

class Process extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_CarType');
        $this->load->model('M_RequiredParts');
        $this->load->model('M_Inventory');

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('login');
        }
    }

    public function request_car()
    {
        $note = '';
        $car_model    = $this->input->post('car_model');
        $quantityInput = $this->input->post('quantity');

        $parts = $this->M_RequiredParts->findByCarType($car_model);

        // kali jumlah parts yang dibutuhkan dikali dengan quantity(mobil yang akan dibuat)
        foreach ($parts as $part) {
            $part->quantity *= $quantityInput;
        }
        print_r($parts);
        // die();

        //input ke database
        foreach ($parts as $part) {
            $car_model = $part->car_model;
            $parts_name = $part->parts_name;
            $quantity = $part->quantity;
            $a = substr($parts_name, 0, 3);

            for ($i = 0; $i < $quantity; $i++) {

                $random_number = '';
                for ($num = 0; $num < 10; $num++) {
                    $random_number .= mt_rand(0, 9);
                }

                $sku = $a . $random_number;
                $data = array(
                    'username' => $this->session->userdata('username'),
                    'sku' => $sku,
                    'car_model' => $car_model,
                    'parts_name' => $parts_name,
                    'status' => 'SPR',
                    'spr_at' => date('Y-m-d H:i:s'),
                );
                $this->M_Inventory->insertData($data);
                // print_r($data."<br>");
            }
            $note = $note . "$i $parts_name untuk $car_model telah dimasukan ke SPR<br>";
        }
        // die();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong><br>' .
            $note
            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        redirect('page/inventory/data_spr');
    }

    public function call_supplier()
    {

        $list = $this->M_Inventory->getOldestData();

        if (empty($list)) {
            // Tampilkan pesan error karena array $list kosong
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data Spare Part Request sedang kosong!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
        redirect('page/inventory/data_soh');
        }

        foreach ($list as $item) {
            $data = array(
                'status' => 'SOH',
                'soh_at' => date('Y-m-d H:i:s'),
            );

            $this->M_Inventory->updateById($data, $item->id);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Supplier datang!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
        redirect('page/inventory/data_soh');
    }

    public function send_parts()
    {
        $car_model    = $this->input->post('car_model');
        $quantityInput = $this->input->post('quantity');

        $rq_parts = $this->M_RequiredParts->findByCarType($car_model);
        $id_parts = [];
        foreach ($rq_parts as $rq_item) {
            $parts_name = $rq_item->parts_name;
            $limit = $rq_item->quantity * $quantityInput;
            $parts = $this->M_Inventory->forSendParts($car_model, $parts_name, $limit);

            // print_r($parts);
            // die();

            // cek ketersediaan parts di SOH
            if (count($parts) < $limit) {
                //Draft : prosess ambil barang dari status IS
                print_r("Parts kurang");
                die();
            }

            foreach ($parts as $item) {
                $id_parts[] = $item->id;
            }
        }

        foreach ($id_parts as $item) {
            $data = array(
                'status' => 'SIT',
                'soh_at' => date('Y-m-d H:i:s'),
            );

            $this->M_Inventory->updateById($data, $item);
        }

        $note = $quantityInput . "set parts " . $car_model . " telah dikirim ke Manufaktur";


        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>' . $note . '</strong><br>
            Status Parts berubah menjadi Stock In Transit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
        redirect('page/inventory/data_soh');
    }


    public function draftProbability() //for quality quality check
    {
        // Generate random number between 1 and 1000
        $randomNumber = rand(1, 1000);

        // Probability of item being damaged is 0.01 (1%)
        $probability = 10;

        // Check if the random number falls within the probability range
        if ($randomNumber <= $probability) {
            // Item is damaged
            echo "Barang rusak.";
        } else {
            // Item is not damaged
            echo "Barang tidak rusak.";
        }
    }
}
