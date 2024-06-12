<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<center>
<body>

    <div class="container">
    <form method="post">
    <h1>Rental Motor</h1>
        <label for="nama">Nama Pelanggan :</label>
        <input type="text" name="nama" required><br> 
        <label for="waktu">Lama Waktu Rental (per hari) :</label>
        <input type="number" name="waktu" required><br>
        
        <label for="type">Jenis motor :</label>
        <select name="type" required> 
            <option value="Scoopy">Scoopy</option>
            <option value="Beatstret">Beatstret</option>
            <option value="Vario">Vario</option>
            <option value="Aerox">Aerox</option>
        </select><br>
        <input type="submit" value="Submit"> <br> 
    </form>
    </div>
    <?php
   
    class rental {
        public $harga;
        public $jenis;
        public $waktu;
        private $member = ['amber', 'annasya', 'aqila', 'adel', 'nisa s', 'nisa a'];
    
        
        public function __construct($harga, $jenis, $waktu) {
            $this->harga = $harga;
            $this->jenis = $jenis;
            $this->waktu = $waktu;
        }
        
        
        public function pajak() {
            return 10000; 
        }
    
        
        public function hitung() {
            $pajak = $this->pajak();
            $total = $this->harga * $this->waktu + $pajak; 
    
            
            if (in_array(strtolower($this->jenis), $this->member)) {
                $diskon = 0.05 * $total; 
                $total -= $diskon;
            }
    
            return $total;
        }
    }    

  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"]; 
        $waktu = $_POST["waktu"]; 
        $type = $_POST["type"]; 
        $harga_motor = 0;
    
       
        switch ($type) {
            case "Scoopy":
                $harga_motor = 55000;
                break;
            case "Beatstret":
                $harga_motor = 65000;
                break;
            case "Vario":
                $harga_motor = 70000;
                break;
            case "Aerox":
                $harga_motor = 80000;
            default:
                echo "This type is not valid..";
                break;
        }
    
       
        $rental = new rental($harga_motor, $nama, $waktu);
        $total_biaya = $rental->hitung(); 

     
?>    
        <div class="output-box">
    <?php
    
        echo "Total Biaya Rental Untuk $nama <br> Dengan Jenis Motor : ($type) <br> Selama $waktu Hari Adalah : Rp. " . number_format($total_biaya, 2);

    }
    ?>
    </div>
    </center>
</body>
</html>