<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public $data = array();
    

    function __construct()
    {
        parent::__construct();
        $this->load->library('admin_template',NULL,'at');
        $this->load->model('m_admin','ma');
        // auto load
    }

    function index() ///dashboard
    {
        // cek login
        if($this->session->userdata('data_admin')['status']!='logged')
        {
            redirect('admin/login');
        }
        // end cek login
        $data['title']='dashboard';
        $this->at->render('admin/content/dashboard',$data);
    }

 
    function barang() ///halaman barang
    {
        // cek login
        if($this->session->userdata('data_admin')['status']!='logged')
        {
            redirect('admin/login');
        }
        $data['title']='barang';
        $this->at->render('admin/content/barang',$data);
    }

    
    function load_barang()
    {
        //cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            if($this->input->post('view')==1)
            {
                $barang = $this->ma->get_all('barang');
                $kategori = $this->ma->get_all('kategori');

                /// start menyisipkan nama kategori untuk ditampilkan ke view
                foreach($barang as $brg)
                {
                    foreach($kategori as $kat)
                    {
                        if($brg->id_kategori == $kat->id_kategori)
                        {
                            $brg->id_kategori=$kat->nama_kategori;
                        }
                    }
                }
                // end menyipsikan....

                
                echo json_encode($barang);
            }
            else
            {
                echo 'error';
            }
        }
        else
        {
            http_response_code(403);
        }

    }

    function tambah_barang()
    {
        $result=array('kode'=>0,'pesan'=>0);

         //cek login
         if($this->session->userdata('data_admin')['status']=='logged')
         {
            $kode_brg = $this->input->post('kode_brg');
            $nama_brg = $this->input->post('nama_brg');
            $stok_brg = $this->input->post('stok_brg');
            $harga_brg = $this->input->post('harga_brg');
            $id_kategori = $this->input->post('id_kategori');
            $deskripsi = $this->input->post('deskripsi');
            $foto = $this->input->post('foto');
            $cek_kode_brg = count($this->ma->get_where('barang',array('kode_brg'=>$kode_brg))); //cek apakah kode barang sudah ada?

            if($kode_brg=='')
            {
                $result['pesan']='Kode barang harus diisi';
            }
            elseif($nama_brg=='')
            {
                $result['pesan']='Nama barang harus diisi';
            }
            elseif($stok_brg=='')
            {
                $result['pesan']='Stok barang harus diisi';
            }
            elseif($harga_brg=='')
            {
                $result['pesan']='Harga barang harus diisi';
            }


            ///==== KATEGORI =====
            elseif(count($this->ma->get_where('kategori',array('id_kategori'=>$id_kategori)))<=0)
            {
                $result['pesan']='Kategori harus dipilih';
            }
            ////===== end KATEGORI =======



            elseif($deskripsi=='')
            {
                $result['pesan']='Deskripsi barang harus diisi';
            }

            
            elseif($cek_kode_brg>0){
                
                $result['pesan']='Kode barang sudah ada';
            }


            else /// jika inputan POST oke semua makaa....
            {
                /// Start check foto
                if(isset($_FILES['foto'])) // jika ada foto nya maka...
                {
                    $up_foto = $this->upload_foto('foto'); /// menjalankan upload foto
                    if($up_foto['kode']==true)
                    {
                        $nama_file = $up_foto['pesan'];
                        $data = array(
                                'kode_brg'=>$kode_brg,
                                'nama_brg'=>ucfirst($nama_brg),
                                'stok_brg'=>$stok_brg,
                                'harga_brg'=>$harga_brg,
                                'id_kategori'=>$id_kategori,
                                'deskripsi'=>$deskripsi,
                                'foto'=>$nama_file,
                                'tanggal_update'=>date('Y-m-d H:i:s')
                            );
                        if($this->ma->insert('barang',$data)>0) /// input barang
                        {
                            $result=array(
                                'kode'=>1,
                                'pesan'=>ucfirst($nama_brg)
                                );
                        }
                        else
                        {
                            $result=array(
                                'kode'=>0,
                                'pesan'=>ucfirst($nama_brg)
                                );
                        }
                        
                    }
                    else ///jika foto nya gagal upload
                    {
                        $result['pesan']=$up_foto['pesan'];
                    }

                }
                else //jika gaada inputan $_FILES nya
                {
                    http_response_code(404);
                    
                }
        
            }

        
            echo json_encode($result);
        }
    } 
        
        





    function load_kategori()
    {
        //cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            if($this->input->post('load')==1)
            {
                $kategori = $this->ma->get_all('kategori');
                echo json_encode($kategori);
            }
            else
            {
                echo 'error';
            }
        }
        
    }
    


    function hapus_barang()
    {   
        $result=array('kode'=>0,'pesan'=>0);

        //cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            $id_barang = $this->input->post('id_barang');
            if($id_barang!=NULL)
            {
                $where = array('id_barang'=>$id_barang);
                if($this->ma->delete('barang',$where)>0)
                {
                    $result=array(
                        'kode'=>1,
                        'pesan'=>'Berhasil menghapus'
                    );
                }
                else
                {
                    $result['pesan']='Terjadi kesalahan';
                    
                }

            }
            else
            {
                echo 'nothing';
            }
        }
        
        
        echo json_encode($result);
        
    }


    function load_barang_by() /// get barang by kode barang
    {
        $result = array('kode'=>0,'pesan'=>'');

        //cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            $id_barang = $this->input->post('id_barang');
            if($id_barang!=NULL)
            {
                $barang = $this->ma->get_where('barang',array('id_barang'=>$id_barang));
                if(count($barang)>0)
                {
                    echo json_encode($barang);
                }
                else
                {
                    $result =array('kode'=>0,'pesan'=>'Barang tidak ditemukan');
                    echo json_encode($result);
                }

            }
            else
            {
                http_response_code(404);
            }
        }
         


        
    }




    function update_barang()
    {
        
        $result=array('kode'=>0,'pesan'=>0); // pesan

        //cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            $id_barang = $this->input->post('id_barang');
            $kode_brg = $this->input->post('kode_brg');
            $nama_brg = $this->input->post('nama_brg');
            $stok_brg = $this->input->post('stok_brg');
            $harga_brg = $this->input->post('harga_brg');
            $id_kategori = $this->input->post('id_kategori');
            $deskripsi = $this->input->post('deskripsi');
            $foto = $this->input->post('foto');
            

            if ($id_barang=='') {
                $result['pesan']='Id nya kok tidak ada?';
            }
            elseif($kode_brg=='')
            {
                $result['pesan']='Kode barang harus diisi';
            }
            elseif($nama_brg=='')
            {
                $result['pesan']='Nama barang harus diisi';
            }
            elseif($stok_brg=='')
            {
                $result['pesan']='Stok barang harus diisi';
            }
            elseif($harga_brg=='')
            {
                $result['pesan']='Harga barang harus diisi';
            }


            ///==== start KATEGORI =====
            elseif(count($this->ma->get_where('kategori',array('id_kategori'=>$id_kategori)))<=0)
            {
                $result['pesan']='Kategori harus dipilih';
            }
            ////===== end KATEGORI =======



            elseif($deskripsi=='')
            {
                $result['pesan']='Deskripsi barang harus diisi';
            }

            
            else /// jika inputan POST oke semua makaa....
            {
                //===== start urutkan data ===== //
                $data = array(
                    'kode_brg'=>$kode_brg,
                    'nama_brg'=>ucfirst($nama_brg),
                    'stok_brg'=>$stok_brg,
                    'harga_brg'=>$harga_brg,
                    'id_kategori'=>$id_kategori,
                    'deskripsi'=>$deskripsi,
                    'tanggal_update'=>date('Y-m-d H:i:s')
                );
                //===== end urutkan data ===== //

            /// Start check inputan variable FOTO
            if(isset($_FILES['foto']))
            {
                /// jika ada variable FOTO maka
                if($_FILES['foto']['name']!=NULL) // cek apakah ada inputan file ? jika ada makaa
                {
                    //echo 'variable FOTO ada isi nya';
                    $up_foto = $this->upload_foto('foto'); /// menjalankan upload foto
                    if($up_foto['kode']==true)
                    {
                        $nama_file = $up_foto['pesan']; // penamaan file

                        /// array push untuk update foto
                        $data['foto']=$nama_file;


                        if($this->ma->update('barang',$data,array('id_barang'=>$id_barang))>0) /// input barang
                        {
                            $result=array(
                                'kode'=>1,
                                'pesan'=>'Berhasil mengubah'.ucfirst($nama_brg)
                                );
                        }
                        
                    }
                    else ///jika foto nya gagal upload
                    {
                        $result['pesan']=$up_foto['pesan'];
                    }

                }
                else /// jika tidak ada inputan file makaa... tetep upload yah tanpa foto
                {
                    //echo 'variable FOTO tidak ada isinya';
                    if($this->ma->update('barang',$data,array('id_barang'=>$id_barang))>0) /// input barang
                    {
                            $result=array(
                                'kode'=>1,
                                'pesan'=>'Mengubah '.ucfirst($nama_brg)
                                );
                    }
                    else
                    {
                            $result = array('pesan'=>'Id tidak ditemukan');
                    }
                }
            }
            else
            {
                /// jika tidak ada variable
                $result['pesan']='dimana variable foto nya?';
            }
            /// end check inputan variable foto
        
            }
        }

        

     
        echo json_encode($result);
        
    }/// end update_barang()




    /// start upload_foto()
   function upload_foto($foto)
   {
        
        //=========== start upload gambar ===================//
        $config['upload_path'] = './uploads/items';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if( ! $this->upload->do_upload($foto))
        {
            $status = array('kode'=>false,'pesan'=>$this->upload->display_errors());
            return $status;
           
        }
        else
        {
            $upload_data = $this->upload->data();
            $status = array('kode'=>true,'pesan'=>$upload_data['file_name']);
            return $status;
        }
    }



    function test()
    { 
        // $pesan = array('kode'=>1,'pesan'=>'Berhasil input resi');
        // echo json_encode($pesan);
        // $this->kurangin_stock('INET1080634517');
        $cek_kode_brg = count($this->ma->get_where('barang',array('kode_brg'=>'029')));
        echo $cek_kode_brg;
    }

    function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //start cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            redirect('admin');
        }
        else
        {

        }
        // end cek login

        //start cek inputan user pass
        if($username && $password !=NULL)
        {
            // do login
            // then redirect
            $password = md5($password);

            $cek_login = $this->ma->get_where('admin',array('username'=>$username,'password'=>$password));

            if(count($cek_login)>0)
            {
                /// create session
                $data_admin = array(
                    'username'=>$username,
                    'status'=>'logged'
                );
                $this->session->set_userdata(array('data_admin'=>$data_admin));
                redirect('admin');
            }
            else
            {
                $this->session->set_flashdata('pesan_gagal','Kombinasi Username dan Password tidak valid!');
                redirect('admin/login');
            }
            // echo $password;
            // echo '<br>';
            // echo $username;
            // echo '<br>';
            // var_dump($cek_login);
        }
        else
        {
            $data['title']='login admin';
            $this->load->view('admin/content/login',$data);
        }
        // end cek 

        
    }

    function logout()
    {
        $this->session->unset_userdata('data_admin');
        redirect('admin/login');
    }



    // start kurangin stock
    private function kurangin_stock($no_pesanan)
    {
        $pesanan_isi = $this->ma->get_where('pesanan_isi',array('no_pesanan'=>$no_pesanan));

        foreach($pesanan_isi as $psi)
        {
            $barang = $this->ma->get_where('barang',array('id_barang'=>$psi->id_barang));
            
            $stok_di_barang = $barang[0]->stok_brg;
            $qty = $psi->qty;
            $stok_di_barang = $stok_di_barang-$qty;

            // cek apakah hasil pengurangan stok barang menjadi 0 bahkan <0 ?
            if($stok_di_barang<0)
            {
                $stok_di_barang = 0;
            }


            // lakukan update stok barang
            $upStokBarang = $this->ma->update('barang',array('stok_brg'=>$stok_di_barang),array('id_barang'=>$psi->id_barang));

            
        }
    }
    // end kurangin stock

    // start total barang saat ini
    function total_stock()
    {
        // cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            // cek input
            if($this->input->post('view')==1)
            {
                $total_barang = 0;
                $barang = $this->ma->get_all('barang');

                foreach($barang as $brg)
                {
                    $total_barang = $total_barang+$brg->stok_brg;
                }
                echo $total_barang;
            }
        }
    }
    // end total barang saat ini


    // start total barang terjual
    function total_barang_terjual()
    {
        // cek login
        if($this->session->userdata('data_admin')['status']=='logged')
        {
            // cek input
            if($this->input->post('view')==1)
            {
                $total_barang = 0;
                $pesanan_isi = $this->ma->get_all('pesanan_isi');

                foreach($pesanan_isi as $brg)
                {
                    $total_barang = $total_barang+$brg->qty;
                }
                echo $total_barang;
            }
        }
    }
    // end total barang terjual
   

    // start total barang terjual
    function pendapatan()
    {
        // cek login
        // if($this->session->userdata('data_admin')['status']=='logged')
        // {
            // cek input
            if($this->input->post('view')==1)
            {
                $total_pendapatan = 0;
                $pesanan = $this->ma->get_data_pendapatan();

                foreach($pesanan as $v)
                {
                    $kurir = $this->ma->get_where('kurir',array('id_kurir'=>$v->id_kurir));

                    $pendapatan_kotor = $v->total_harga;
                    $biaya_kurir = $kurir[0]->harga_kurir;
                    $pendapatan_bersih = $pendapatan_kotor-$biaya_kurir;


                    $total_pendapatan = $total_pendapatan+$pendapatan_bersih;
                }
                echo $total_pendapatan;

                
            }
        // }
    }
    // end total barang terjual
}





?>