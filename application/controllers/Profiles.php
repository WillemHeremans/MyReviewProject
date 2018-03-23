<?php
class Profiles extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('profiles_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['profiles'] = $this->profiles_model->get_profiles();
                $data['title'] = 'Profiles';

                $this->load->view('templates/header', $data);
                $this->load->view('tests/profiles', $data);
                $this->load->view('templates/footer');
        }

        public function profilepage($pseudo = NULL)
        {
                $data['profiles_item'] = $this->profiles_model->get_profiles($pseudo);

                if (empty($data['profiles_item']))
                {
                        show_404();
                }

                $data['title'] = $data['profiles_item']['pseudo'];

                $this->load->view('templates/header', $data);
                $this->load->view('tests/profilepage', $data);
                $this->load->view('templates/footer');
        }

//         public function create()
//         {
//                 $this->load->helper('form');
//                 $this->load->library('form_validation');
                
//                 $data['title'] = 'Create a news item';
                
//                 $this->form_validation->set_rules('title', 'Title', 'required');
//                 $this->form_validation->set_rules('text', 'Text', 'required');
                
//                 if ($this->form_validation->run() === FALSE)
//                 {
//                         $this->load->view('templates/header', $data);
//                         $this->load->view('news/create');
//                         $this->load->view('templates/footer');
                
//                 }
//                 else
//                 {
//                         $this->news_model->set_news();
//                         $this->load->view('news/success');
//                 }
//         }

 }