<?php

class Flasher
{
  public static function setFlash($tipe, $kategori, $pesan, $aksi)
  {
    $_SESSION['flash'] = [
      'tipe'     => $tipe,
      'kategori' => $kategori,
      'pesan'    => $pesan,
      'aksi'     => $aksi
    ];
  }

  public static function flash()
  {
    if (isset($_SESSION['flash'])) {
      echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
              ' . $_SESSION['flash']['kategori'] . ' <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';

      unset($_SESSION['flash']);
    }
  }
}
