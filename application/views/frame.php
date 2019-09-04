<?php
$this->load->view('components/header');
echo '<div class="noprint">';
$this->load->view('components/left-sidebar');
$this->load->view('components/right-sidebar');
echo '</div>';
$this->load->view($subview);
echo '<div class="noprint">';
$this->load->view('components/footer');
echo '</div>';