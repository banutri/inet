<?php



class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");


        /// auto load disini
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger font-weight-bold" style="font-size:2.2vh">', '</span>');

        $this->load->library('customer_template',NULL,'ct');
        $this->load->model('M_Customer','mc');
        $this->login();
    }

    ///untuk login sementara

    private function login()
    {
        if($this->session->userdata('data_user')['status']!='logged')
        {
            // set session
            $tgl = date('d-m-Y H:i:s');
            $random = rand(1,999);
            $id_user = md5($tgl.''.$random);

            $data_user = array('data_user'=>array('id_user'=>$id_user,'status'=>'logged'));
            $this->session->set_userdata($data_user);
        }
        else
        {

        }

    }
    /// untuk login sementara

   
    function index()
    {
        $data = array();
        $data['title']='home';
        $this->ct->render('customer/content/home',$data);
    }


    /// start load barang
    function load_barang_all()
    {
        if($this->input->post('view')==1)
        {
            /// load semua barang
            $barang = $this->mc->get_all_barang();
            
            
            echo json_encode($barang);
            //print_r($barang);
        }
        else
        {
            http_response_code(401);

        }
    }
    /// end load barang

    /// start get kategori ll
    function get_kategori_all()
    {
        if($this->input->post('view')==1)
        {
            $kategori = $this->mc->get_all('kategori');
            echo json_encode($kategori);
        }
        else
        {
            http_response_code(404);
        }
    }
    /// end get kategori


    /// start load barang by kategori
    function load_barang_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        if($id_kategori!=NULL)
        {
            $barang = $this->mc->get_all_barang_kategori(array('kategori.id_kategori'=>$id_kategori));
            echo json_encode($barang);
        }
        else
        {
            http_response_code(405);
        }
    }
    /// start load barang by kategori


    /// start search barang
    function search()
    {
        $search = $this->input->post('data'); // menangkap inputan dari customer
        if($search!=NULL){
            $hasil_search = $this->mc->search_data($search); // melakukan pencarian
            echo json_encode($hasil_search);
        }

        else
        {
            http_response_code(400);

        }
        
    }

    /// end search barang



    /// start load barang by
    function load_barang_by()
    {
        $id_barang = $this->input->post('id_barang');
        if($id_barang!=NULL)
        {
            $barang = $this->mc->get_where('barang',array('id_barang'=>$id_kategori));

        }
        
    }

    // end laod barang by


    // start function beli detail
    function beli_detail()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');

        // cek user
        if($this->session->userdata('data_user')['status']!='logged')
        {
            redirect('auth/login');
        }
        // end cek user

        // cek inputan
        if($id_barang && $qty == NULL)
        {
            redirect('customer');
        }
        // end cek inputan
        
        /// start cek keberadaan stok barang //
        $barang = $this->mc->get_where('barang',array('id_barang'=>$id_barang));
        if($barang[0]->stok_brg<=0)
        {
            /// jika stok barang udah abis duluan maka
            $this->session->set_flashdata('pesan_gagal','Barang habis');
            redirect('customer');
        }
        else
        {
            $this->tambah_keranjang($qty,$id_barang);
            redirect('customer/keranjang');

        }

    }
    // end function beli detail


    function detail($id_barang=NULL)
    {
        $data['title']='detail';
        if($id_barang!=NULL)
        {
            $barang = $this->mc->get_where('barang',array('id_barang'=>$id_barang));
            if(count($barang)>0)
            {
                $data['barang']=$barang;
            
                $this->ct->render('customer/content/detail',$data);
            }
            else
            {
                http_response_code(404);
            }
           
        }
        else
        {
            redirect('customer');
        }



        
    }
   

    function beli()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = 1;

        // cek user
        if($this->session->userdata('data_user')['status']!='logged')
        {
            redirect('auth/login');
        }
        // end cek user

        // cek inputan
        if($id_barang==NULL)
        {
            redirect('customer');
        }
        // end cek inputan
        
        /// start cek keberadaan stok barang //
        $barang = $this->mc->get_where('barang',array('id_barang'=>$id_barang));
        if($barang[0]->stok_brg<=0)
        {
            /// jika stok barang udah abis duluan maka
            $this->session->set_flashdata('pesan_gagal','Barang habis');
            redirect('customer');
        }
        else
        {
            $this->tambah_keranjang($qty,$id_barang);
            redirect('customer/keranjang');

        }
        
    }

    
    function keranjang()
    {
        /// cek login 
        if($this->session->userdata('data_user')['status']!='logged')
        {
            redirect('auth/login');
        }
        $data['title']='keranjang';
        $this->ct->render('customer/content/keranjang',$data);
    }


    function add_to_cart()
    {
        $pesan = array('kode'=>0,'pesan'=>'');

        /// chek user login 
        if($this->session->userdata('data_user')['status']!='logged')
        {
            $pesan['pesan']='Anda harus login!. klik <a href="'.base_url('auth/login').'" class="badge badge-info">disini</a>';
            echo json_encode($pesan);
        }
        else
        {
            $id_barang = $this->input->post('id_barang');
            $qty = 1;

            
            if($id_barang!=NULL)
            {
                /// start cek keberadaan barang //
                $barang = $this->mc->get_where('barang',array('id_barang'=>$id_barang));
                if($barang[0]->stok_brg<=0)
                {
                    /// jika stok barang udah abis duluan maka
                $pesan['pesan']='Stok habis!';
                }
                else
                {
                    $isInsert = $this->tambah_keranjang($qty,$id_barang);
                    if($isInsert==TRUE)
                    {
                        $pesan = array('kode'=>1,'pesan'=>'Berhasil menambahkan ke keranjang');
                    }
                    else
                    {
                        $pesan = array('kode'=>0,'pesan'=>'Gagal Menambahkan') ;
                    }
                    

                }
                echo json_encode($pesan);
            }
            else
            {
                echo json_encode('Mbledos');
                http_response_code(409);
            }
        }

        /// end


        
    }

    function keranjang_aksi()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = intval($this->input->post('qty'));
        if($id_barang && $qty !=NULL && $qty>0)
        {
            $this->tambah_keranjang($qty,$id_barang);
        }
        else
        {
            $this->session->set_flashdata('pesan_error','Gagal menambahkan keranjang (inputan berubah)');
            redirect('customer');
        }   
    }
    
    private function tambah_keranjang($qty=NULL,$id_barang=NULL)
    {
        /// start cek apakah sudah login?
        if($this->session->userdata('data_user')['status']!='logged')
        {
            redirect('auth/login');
        }
        else
        {
            
                $id_user = $this->session->userdata('data_user')['id_user'];
                $barang = $this->mc->get_where('barang',array('id_barang'=>$id_barang));

                // pengecekan apakah ada barang nya?
                if(count($barang)>0 ) 
                {
                    
                    // pengecekan apakah stok nya ada 
                    if($barang[0]->stok_brg>0) 
                    {
                        
                      
                        // pengecekan isi keranjang
                        // pengecekan apakah id barang sama? jika sama maka update qty nya saja
                        // jika tidak, maka insert ke database tabel keranjang
                        $keranjang = $this->mc->get_where('keranjang',array('id_user'=>$id_user));


                        // cek apakah get isi keranjang by id user berhsil?
                        if(count($keranjang)>0)
                        {
                            /// doi udah masukin keranjang
                            /// start cek id ///
                            $id_yg_sama='';
                            foreach($keranjang as $krj)
                            {
                                //echo $krj->id_barang; /// harus cari id nya 1 1 
                                if($id_barang==$krj->id_barang)
                                {
                                    $id_yg_sama=$krj->id_barang;
                                }
                                else
                                {
                                    //do nothing
                                }
                            }
                            /// end cek id yg sama ///

                            if($id_yg_sama!='') // jika keranjang udh ada id barang yg sama maka update qty
                            {
                                // maka do update qty
                                $keranjang = $this->mc->get_where('keranjang',array('id_user'=>$id_user,'id_barang'=>$id_barang));
                                $barang_saat_ini = $keranjang[0]->qty; /// qty dari tabel keranjang


                                // jika qty dan stok melebihi angka 10, maka harus dilakukan pengecekan

                                // jika qty lebih dari sama dengan 10
                                $jumlah_qty = $qty+$barang_saat_ini;
                                if($jumlah_qty>10)
                                {
                                    // cari selisih
                                    $selisih_qty = $jumlah_qty-10;
                                    $jumlah_qty = $jumlah_qty-$selisih_qty;
                                }

                                
                                // end selisih qty


                                // start cek apakah stok sesuai dengan qty // 
                                $jumlah_qty = $this->cek_stok_qty($jumlah_qty,$barang[0]->stok_brg);
                                // end check stok qty //

                                // update qty 
                                $isUpdate = $this->update_qty($id_barang,$jumlah_qty);


                                
                                if($isUpdate>0)
                                {
                                    $this->session->set_flashdata('pesan_berhasil','Berhasil menambahkan keranjang');
                                    return TRUE;
                                    
                                }
                                else
                                {
                                    $this->session->set_flashdata('pesan_berhasil','Berhasil menambahkan keranjang');
                                    return TRUE;
                                  
                                }

                            }
                            else
                            {
                                // maka do insert ke keranjang

                                /// cek qty, maksimal 10
                                if($qty>10)
                                {
                                    $qty = 10;
                                }
                                // end cek qty

                                $barang = array(
                                    'id_user'=>$id_user,
                                    'id_barang'=>$id_barang,
                                    'qty'=>$qty,
                                );
                                $isInsert = $this->mc->insert('keranjang',$barang);
                                if($isInsert>0)
                                {
                                    $this->session->set_flashdata('pesan_berhasil','Berhasil menambahkan keranjang');
                                    return TRUE;
                                    
                                }
                                else
                                {
                                    $this->session->set_flashdata('pesan_gagal','Gagal menambahkan keranjang');
                                    return FALSE;
                                    
                                }
                            }
                            
                            
                        }
                        else
                            {
                                // maka do insert ke keranjang
                                $barang = array(
                                    'id_user'=>$id_user,
                                    'id_barang'=>$id_barang,
                                    'qty'=>$qty,
                                );
                                $isInsert = $this->mc->insert('keranjang',$barang);
                                if($isInsert>0)
                                {
                                    $this->session->set_flashdata('pesan_berhasil','Berhasil menambahkan keranjang');
                                    return TRUE;
                                    
                                }
                                else
                                {
                                    $this->session->set_flashdata('pesan_gagal','Gagal menambahkan keranjang');
                                    return FALSE;
                                    
                                }
                            }
                    }   
                    else
                    {
                        $this->session->set_flashdata('pesan_gagal','Barang habis!');
                        redirect('customer');
                    }
                    // end chek stok

                }
                else
                {
                    $this->session->set_flashdata('pesan_gagal','tidak ada');
                    redirect('customer');
                }
                // end cek keberadaan barang
           
           
        }
        /// end check login
    }

    function update_keranjang()
    {
        $id_user = $this->session->userdata('data_user')['id_user'];
        $qty = $this->input->post('qty');
        $id_barang = $this->input->post('id_barang');

        if($qty && $id_barang !=NULL)
        {
            /// cek length dari kedua array  yaitu $qty dan $id_barang
            if(count($qty) == count($id_barang))
            {
                $length = count($qty);
                for($i=0; $i<$length;)
                {
                    $this->update_qty($id_barang[$i],$qty[$i]);
                    $i++;
                }

                redirect('customer/checkout');

            }
            else
            {
                echo 'tidak sama';
            }
        }

    }

    function hapus_item_keranjang()
    {
        $id_barang = $this->input->post('id_barang');
        if($id_barang!=NULL)
        {
            if($this->hapus_keranjang_aksi($id_barang)==TRUE)
            {
                echo json_encode(array('kode'=>1,'pesan'=>'Berhasil menghapus'));
            }
            else
            {
                echo json_encode(array('kode'=>0,'pesan'=>'Gagal menghapus'));
            }
        }
        else
        {
            echo json_encode('no!');
            http_response_code(404);
        }
    }

  

    function get_data_keranjang()
    {
        if($this->input->post('view')==1)
        {
            // $id_user = 1;
            $id_user = $this->session->userdata('data_user')['id_user'];
            if($id_user!=NULL)
            {
                $keranjang = $this->mc->get_isi_keranjang($id_user);
                $count = count($keranjang);
                if($count>0)
                {
                    $result['jumlah_isi']=$count;
                    $result['isi_keranjang']=$keranjang;
                    echo json_encode($result);
                }
                else
                {
                    $result['jumlah_isi']=$count;
                    $result['isi_keranjang']=$keranjang;
                }
            }
            else
            {
                echo 'id user nya mana :(';
            }
        }
        else
        {
            http_response_code(404);
        }
    }


    function checkout()
    {
        if($this->session->userdata('data_user')['status']!='logged')
        {
            redirect('auth/login');
        }
        $id_user = $this->session->userdata('data_user')['id_user'];
        $data['title'] = 'checkout';
        $data['keranjang'] = $this->mc->get_isi_keranjang($id_user);
        $data['kurir'] = $this->mc->get_all('kurir');
        $data['bank'] = $this->mc->get_all('bank_transfer');

        // start keranjang ada isi nya apa tidak
        if(count($data['keranjang'])<=0)
        {
            redirect('customer');
        }
        // end
        $this->ct->render('customer/content/checkout',$data);
    }


   

    function buat_pesanan()
    {
        $id_kurir = $this->input->post('id_kurir');
        $id_bank = $this->input->post('id_bank');
        $nama_user = $this->input->post('nama_user');
        $no_hp_user = $this->input->post('no_hp_user');
        $alamat_user = $this->input->post('alamat_user');

        // start cek user
        if($this->session->userdata('data_user')['status']!='logged')
        {
            redirect('auth/login');
        }
        else
        {
            $id_user = $this->session->userdata('data_user')['id_user']; // get id_user

            // start cek input an
            if($id_kurir && $id_bank ==NULL) // cek input an
            {
                redirect('customer/keranjang');
            }
            else
            {

                // input detail user ke tabel detail_user
                
                $data_user = array(
                    'id_user'=>$id_user,
                    'nama_user'=>ucwords($nama_user),
                    'no_hp_user'=>$no_hp_user,
                    'alamat_user'=>ucwords($alamat_user)
                );

                /// cek apakah sudah ada detail 
                $cek_detail = $this->mc->get_where('user_detail',array('id_user'=>$id_user));
                if(count($cek_detail)>0)
                {
                    $this->mc->update('user_detail',$data_user,array('id_user'=>$id_user));
                }
                else
                {

                    $this->mc->insert('user_detail',$data_user);
                }
                /// end input detail


                // cek keberadaan kurir dan bank
                $kurir = $this->mc->get_where('kurir',array('id_kurir'=>$id_kurir));
                $bank = $this->mc->get_where('bank_transfer',array('id_bank'=>$id_bank));

                if(count($kurir) && count($bank) >0 )
                {
                    //start get isi keranjang dan jumlah isi nya
                    $keranjang = $this->mc->get_where('keranjang',array('id_user'=>$id_user));
                    $jumlah_isi_keranjang = count($keranjang);
                    // end get isi keranjang


                    // start melakukan check keberadaan barang
                    $brg_exist = TRUE;
                    for($i=0; $i<$jumlah_isi_keranjang;)
                    {
                        $barang = $this->mc->get_where('barang',array('id_barang'=>$keranjang[$i]->id_barang));
                        if(count($barang)>0)
                        {
                            /// jika barang ada , maka do nothing
                        }
                        else
                        {
                            /// jika barang tidak ada, maka hapus isi keranjang sesuai id_barang yg tidak ada di tabel barang
                            $this->hapus_keranjang_aksi($keranjang[$i]->id_barang); // do hapus
                            $brg_exist = FALSE;

                        }
                       
                        $i++; // hehe lupa
                    }
                    //////// ======                        
                    if($brg_exist==FALSE){
                        $this->session->set->flashdata('pesan_gagal','Maaf, barang tidak ada');
                        redirect('customer/keranjang'); // jika ada barang yg hilang, maka redirect ke keranjang
                    }
                    else
                    {
                        /// do nothing
                    } 
                    /////// =======
                    // end cek keberadaan barang




                    // start cek stok barang
                    $stok_oke = TRUE;
                    for($i=0; $i<$jumlah_isi_keranjang;)
                    {
                        $barang = $this->mc->get_where('barang',array('id_barang'=>$keranjang[$i]->id_barang));
                        if(count($barang)>0)
                        {
                            // jika stok ada, maka do nothing
                        }
                        else
                        {
                            /// jika barang tidak ada, maka hapus isi keranjang sesuai id_barang yg tidak ada stok nya di tabel barang
                            $this->hapus_keranjang_aksi($keranjang[$i]->id_barang); // do hapus
                            $stok_oke = FALSE;   
                        }
                        $i++;
                    }

                    //////// ======                        
                    if($stok_oke==FALSE){
                        $this->session->set->flashdata('pesan_gagal','Maaf, ada barang stok nya habis');
                        redirect('customer/keranjang'); // jika ada stok barang yg habis, maka redirect ke keranjang
                    }
                    else
                    {
                        /// do nothing
                    } 
                    /////// =======
                    // end cek stok barang


                    //// JIKA SEMUA NYA OKE MAKA
                    // melakukan kalkulasi biaya

                    // harga kurir
                   $harga_kurir = intval($kurir[0]->harga_kurir);
                   // end harga kurir


                   // harga total barang
                    $total_barang=0;
                    $isi_keranjang = $this->mc->get_isi_keranjang($id_user);
                    foreach($isi_keranjang as $v)
                    {
                        $total_barang = $total_barang + ($v->harga_brg*$v->qty);
                    }
                   // end harga total barang


                   /// start total harga, kurir dan barang
                   $total_harga = $harga_kurir + $total_barang;
                   // end total harga, kurir dan barang

                   /// start mendapatkan nomor pesanan
                   $no_pesanan = $this->random_no_pesanan();
                   /// end mendapatkan nomor pesanan

                   // start masukan no pesanan ke session
                   $data_pesanan = array('no_pesanan'=>$no_pesanan);
                   $this->session->set_userdata(array('data_pesanan'=>$data_pesanan));
                   // end masukan no pesanan ke session

                   /// start masukan isi keranjang ke tabel pesanan

                    $pesanan = array(
                        'no_pesanan'=>$no_pesanan,
                        'id_user'=>$id_user,
                        'id_kurir'=>$id_kurir,
                        'total_harga'=>$total_harga,
                        'dibuat_pesanan'=>date('Y-m-d H:i:s'),
                        'berakhir_pesanan'=>$this->tanggalExp(date('Y-m-d H:i:s'))
                    );

                    
                    $isInsert = $this->mc->insert('pesanan',$pesanan);
                    if($isInsert>0)
                    {
                        // do nothing
                    }
                    else
                    {
                        /// eror
                        $this->session->set_flashdata('pesan_gagal','Gagal buat pesanan');
                        redirect('customer/keranjang');
                    }

                    /// end masukan tabel pesanan

                    /// start ambil detail pesanan
                    $pesanan = $this->mc->get_where('pesanan',array('no_pesanan'=>$no_pesanan));
                    // end ambil detail pesanan 

                    // start insert ke tabel pembayaran
                    
                    

                    $no_pembayaran = $this->gen_no_pembayaran($bank[0]->no_rek,$no_hp_user);

                    $pembayaran = array(
                        'no_pembayaran'=>$no_pembayaran,
                        'id_user'=>$id_user,
                        'id_pesanan'=>$pesanan[0]->id_pesanan,
                        'id_bank'=>$bank[0]->id_bank,
                        'no_pesanan'=>$no_pesanan,
                        'total_harga'=>$total_harga,
                        'dibuat_pembayaran'=>date('Y-m-d H:i:s'),
                        'expired'=>$this->tanggalExp(date('Y-m-d'))
                    );
                    $isInsert = $this->mc->insert('pembayaran',$pembayaran);
                    if($isInsert>0)
                    {
                        // do nothing
                    }
                    else
                    {
                        // error pembayaran
                        $this->session->set_flashdata('pesan_gagal','Gagal buat pesanan (ins pembayaran)');
                        redirect('customer/keranjang');
                    }
                    // end insert tabel pembayaran



                    // start insert ke tabel pembayaran_isi
                    $pembayaran = $this->mc->get_where('pembayaran',array('no_pesanan'=>$no_pesanan)); // get no pembayaran
                    
                    $pembayaran_isi = array(
                        'id_pembayaran'=>$pembayaran[0]->id_pembayaran,
                        'no_pembayaran' => $pembayaran[0]->no_pembayaran,
                        'no_pesanan' =>$no_pesanan,
                        
                    );
                    $isInsert = $this->mc->insert('pembayaran_isi',$pembayaran_isi);
                    if($isInsert>0)
                    {
                        // do nothing
                    }
                    else
                    {
                        // error insert pembayaran
                        $this->session->set_flashdata('pesan_gagal','Gagal buat pesanan (ins pembayaran_isi)');
                        redirect('customer/keranjang');
                    }
                    /// end inser pembayaran_isi

                    
                    
                    /// start insert pesanan_isi

                    
                    foreach($isi_keranjang as $v)
                    {
                        $nama_kategori = $this->mc->get_kategori_barang($v->id_barang)[0]->nama_kategori;
                        $pesanan_isi = array(
                            'no_pesanan'=>$no_pesanan,
                            'nama_user'=>$nama_user,
                            'id_barang'=>$v->id_barang,
                            'kode_brg'=>$v->kode_brg,
                            'nama_brg'=>$v->nama_brg,
                            'deskripsi'=>$v->deskripsi,
                            'harga_brg'=>$v->harga_brg,
                            'qty'=>$v->qty,
                            'nama_kategori'=>$nama_kategori,
                            'nama_kurir'=>$kurir[0]->nama_kurir,
                            'harga_kurir'=>$kurir[0]->harga_kurir,
                            'situs_kurir'=>$kurir[0]->situs_kurir,
                            'foto' =>$v->foto
                        );
                        $isInsert = $this->mc->insert('pesanan_isi',$pesanan_isi);
                        if($isInsert>0)
                        {
                            //pass
                        }
                        else
                        {
                            // error insert pesanan_isi
                            $this->session->set_flashdata('pesan_gagal','Gagal buat pesanan (ins isi pesanan)');
                            redirect('customer/keranjang');
                        }
                        
                    }
                    /// harusnya sih sukses semua insert an nya

                    /// jika operasi diatas berhasil semua, maka keranjang dikosongkan lalu redirect ke halaman pesanan
                    $this->mc->delete('keranjang',array('id_user'=>$id_user)); 
                    redirect('customer/pesanan');

                    /// 

                    // end insert pesanan_isi

                }
                else
                {
                    // kurir dan bank error
                    $this->session->set_flashdata('pesan_gagal','Kurir dan Bank error');
                    redirect('customer/keranjang');
                }

                // end cek kurir bank

            }
            // end cek inputan
        }
        // end cek user
    }

    function pesanan()
    {
        // get data_user //
        $user_data = $this->session->userdata('data_user');
        $id_user = $user_data['id_user'];

        // end get data_user //

        /// cek login
        if($user_data['status']!='logged')
        {
            redirect('auth/login');
        }
        // end cek login

        $data_pesanan = $this->session->userdata('data_pesanan');
        if($data_pesanan==NULL)
        {
            $this->session->set_flashdata('pesan_gagal','Anda belum membuat pesanan!');
            redirect('customer');
        }
        else
        {
        }

        $id_pesanan=$this->mc->get_where('pesanan',array('no_pesanan'=>$data_pesanan['no_pesanan']))[0]->id_pesanan;
        $data['pesanan_isi']=$this->mc->get_where('pesanan_isi',array('no_pesanan'=>$data_pesanan['no_pesanan']));
        $data['pembayaran']=$this->mc->get_data_pembayaran_by($id_pesanan);
        $data['detail_pesanan']=$this->mc->get_detail_pesanan($id_pesanan);
        
        // var_dump($this->mc->get_detail_pesanan($id_pesanan));
        
        
        $data['title']= 'pesanan';
        $this->ct->render('customer/content/pesanan',$data);
        
    }


    function get_data_kurir_by()
    {
        $id_kurir =$this->input->post('id_kurir');
        if($id_kurir !=NULL)
        {
            $kurir = $this->mc->get_where('kurir',array('id_kurir'=>$id_kurir));
            if(count($kurir)>0)
            {
                echo json_encode($kurir);

            }
            else
            {
                http_response_code(404);
            }
        }
        else
        {
            http_response_code(204);
        }
    }



    function test()
    {
        var_dump($_SESSION);
       
    }
    function test1()
    {
        session_destroy();
    }

   

    private function hapus_keranjang_aksi($id_barang)
    {
        /// do hapus
        $isDelete = $this->mc->delete('keranjang',array('id_barang'=>$id_barang));
        if($isDelete>0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    private function update_qty($id_barang, $qty)
    {
        $id_user = $this->session->userdata('data_user')['id_user']; /// get user


        /// start cek keberadaan stok barang //
        $barang = $this->mc->get_where('barang',array('id_barang'=>$id_barang));
        if($barang[0]->stok_brg<=0)
        {
            /// jika stok barang udah abis duluan maka
            $this->hapus_keranjang($id_barang);
        }
        else
        {
            $barang = array('qty'=>$qty);
            $isInsert = $this->mc->update('keranjang',$barang,array('id_user'=>$id_user,'id_barang'=>$id_barang));
            if($isInsert>0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        /// end check keberadaan stok barang //
        
    }

    private function cek_stok_qty($qty,$stok)
    {
        
        if($stok>10) 
        {
            if($qty >10)
            {
                $qty =10;
            }
            else
            {
                //nothing
            }
        }
        else if($stok<=10)
        {
           if($qty > $stok)
            {
                $qty =$stok;
            }
            else
            {
                //nothing
            }
                
        }

        return $qty;

        
    }
    

    // start function update username //
    private function up_username($username_baru,$id_user)
    {
        //do update username
        $data = array('username'=>$username_baru);
        $update = $this->mc->update('user',$data,array('id_user'=>$id_user));
        if($update>0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
    }
    // end function update username //

    // start function update password //
    private function up_password($password_baru,$id_user)
    {
        //do update password
        $data = array('password'=>md5($password_baru));
        $update = $this->mc->update('user',$data,array('id_user'=>$id_user));
        if($update>0)
        {
           return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    // end function update username //

   

    private function random_no_pesanan()
    {
        $a = 'INET';
        
        
        $batas = 0;
        while($batas==0)
        {
            for ($i = 0; $i<10; $i++) 
            {
                $a .= mt_rand(0,9);
            }

            // cek keberadaan no pesanan yg sama
            $no_pesanan = $this->mc->get_where('pesanan',array('no_pesanan'=>$a));
            if(count($no_pesanan)>0)
            {
                // jika no pesanan sama, maka do nothing supaya while tetap berjalan
            }
            else
            {
                // jika no pesanan tidak ada yg sama, maka $batas = 0 supaya while berhenti
                $batas =1;
            }

            
        }
        return $a;
    }

    
    private function tanggalExp($tgl='')
    {
        
        $tanggal = new DateTime($tgl); /// instance datetime
        
        $tanggal->modify('+2 day'); /// penambahan 2 hari expired nya

        return $tanggal->format('Y-m-d H:i:s');
    }

    private function gen_no_pembayaran($no_rek,$no_hp)
    {
        // $no_rek = '009999';
        $a = $no_rek;
        $b = '';
        $no = '';
        
        // start ambil 4 biji no hp dari belakang
        $index_no_hp = strlen($no_hp);
        $index_no_hp = $index_no_hp - 4;
        
        for($i=0; $i<4; )
        {
            $no .=$no_hp[$index_no_hp];

            $index_no_hp++;
            $i++;
        }
        // end 4 biji no hp


        
        // echo $no;
        
        $batas = 0;
        while($batas==0)
        {
            for ($i = 0; $i<4; $i++) 
            {
                $b .= mt_rand(0,9);
            }

            // cek keberadaan no pesanan yg sama
            $no_pembayaran= $this->mc->get_where('pembayaran',array('no_pembayaran'=>$b));
            if(count($no_pembayaran)>0)
            {
                // jika no pesanan sama, maka do nothing supaya while tetap berjalan
            }
            else
            {
                // jika no pesanan tidak ada yg sama, maka $batas = 0 supaya while berhenti
                $batas =1;
            }


        }
        $join = $a.''.$b.''.$no;

        return $join;
        // echo $join;
    }

    
}




?>