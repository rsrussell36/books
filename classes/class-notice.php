<?php
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

class Notice
{
    const __BOOKS_PHP__ = '5.6';
    const __MINIMUM_EL_VERSION__ = '2.0.0';

    public function __construct(){
        
    }

    public function books_missing_php(){
        $message = sprintf(__("Your current PHP version is <strong> " . PHP_VERSION . " </strong>. You need to upgrade your PHP version to <strong> " . self::__BOOKS_PHP__ . " or later</strong> to run books plugin.", 'books'));
    ?>
    <style>
        .notice.books-php-version-notice {
            border-left-color: #33ccff !important;
            padding: 20px;
        }
        .rtl .notice.books-php-version-notice {
            border-right-color: #33ccff !important;
        }
        .notice.books-php-version-notice .books-php-version-notice-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .notice.books-php-version-notice .books-php-version-notice-inner .books-php-version-notice-icon,
        .notice.books-php-version-notice .books-php-version-notice-inner .books-php-version-notice-content,
        .notice.books-php-version-notice .books-php-version-notice-inner .books-php-version-install-now {
            display: table-row;
            align-items: center;
            justify-content: space-between;        }
        .notice.books-php-version-notice .books-php-version-notice-icon {
            color: #33ccff;
            font-size: 50px;
            width: 50px;
        }
        .notice.books-php-version-notice .books-php-version-notice-content {
            padding: 0 0px;
        }
        .notice.books-php-version-notice p {
            padding: 0;
            margin: 0;
        }
        .notice.books-php-version-notice h3 {
            margin: 0 0 5px;
        }
        .notice.books-php-version-notice .books-php-version-install-now {
            text-align: center;
        }
        .notice.books-php-version-notice .books-php-version-install-now .books-php-version-install-button {
            padding: 5px 30px;
            height: auto;
            line-height: 20px;
            text-transform: capitalize;
            border-color: #33ccff !important;
            background-image: linear-gradient(-9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -moz-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -webkit-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -ms-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
        }
        .notice.books-php-version-notice .books-php-version-install-now .books-php-version-install-button i {
            padding-right: 5px;
        }
        .rtl .notice.books-php-version-notice .books-php-version-install-now .books-php-version-install-button i {
            padding-right: 0;
            padding-left: 5px;
        }
        .notice.books-php-version-notice .books-php-version-install-now .books-php-version-install-button:active {
            transform: translateY(1px);
        }
        @media (max-width: 767px) {
            .notice.books-php-version-notice {
                padding: 10px;
            }
        }
    </style>
        <div class="notice updated books-php-version-notice books-php-version-install-php-version">
            <div class="books-php-version-notice-inner">
                <div class="books-php-version-notice-content">
                    <h3><?php esc_html_e( 'Thanks for installing books Tab!', 'books' ); ?></h3>
                    <p><?php echo $message ; ?></p>
                </div>
            </div>
        </div>
    <?php
    }

    
    
    public function thanks_message_notice() {
        if ( 'true' === get_user_meta( get_current_user_id(), '_books_thanks_notice', true ) ) {
            return;
        }
    ?>
    <style>
        .notice.books-thanks-for-install {
            border-left-color: #33ccff !important;
            padding: 20px;
        }
        .rtl .notice.books-thanks-for-install {
            border-right-color: #33ccff !important;
        }
        .notice.books-thanks-for-install h3 {
            margin: 0 0 5px;
        }
        .notice.books-thanks-for-install p {
            padding: 0;
            margin: 0;
        }
    </style>
    <script>jQuery( function( $ ) {
            $( 'div.notice.books-thanks-for-install' ).on( 'click', 'button.notice-dismiss', function( event ) {
                event.preventDefault();

                $.post( ajaxurl, {
                    action: 'books_set_thanks_message'
                } );
            } );
        } );</script>
        <div class="notice is-dismissible books-thanks-notice books-thanks-for-install">
            <div class="books-thanks-notice-inner">
                <div class="books-thanks-notice-content">
                    <h3><?php esc_html_e( 'Thanks for using Custom Books!', 'books' ); ?></h3>
                    <p><?php esc_html_e( 'Just use and enjoy.', 'books' ); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
    public function ajax_books_set_thanks_message() {
        update_user_meta( get_current_user_id(), '_books_thanks_notice', 'true' );
        die;
    }
}