<?php

class Flasher
{
    public static function setFlash($color, $icon, $text)
    {
        $_SESSION['flash'] = [
            'color' => $color,
            'icon' => $icon,
            'text' => $text
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['color'] . ' alert-dismissible fade show" role="alert">'
                . $_SESSION['flash']['icon'] . ' ' . $_SESSION['flash']['text'] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            unset($_SESSION['flash']);
        }
    }
}
