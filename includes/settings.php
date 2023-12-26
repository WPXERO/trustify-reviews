<?php

if (!class_exists('TRUSTIFY_REVIEWS_SETTINGS')) {
    class TRUSTIFY_REVIEWS_SETTINGS {
        protected $icon_data_uri;
        public function __construct() {
            $icon_base64 = 'PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjAuMjEgOTUuOTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEyMC4yMSA5NS45MiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CiAgICA8cGF0aCBkPSJNOTUuOSA0MS4wNWMtLjAxLjEtLjA0LjItLjA3LjI5LS4wMy4xLS4wNy4xOS0uMTEuMjgtLjA0LjE3LS4wNy4zNS0uMDkuNTQtLjAyLjIxLS4wMy40My0uMDMuNjh2LjAyYzAgLjA0LjAxLjA4LjAxLjEzdjMzLjYyYy4xOS40Ny40MS44OC42NCAxLjIyLjIzLjM1LjQ5LjYzLjc2Ljg0bC4wMS4wMWMuMjQuMTkuNTEuMzMuODEuNDIuMy4wOS42NC4xMyAxIC4xMiAyLjU5LS4yMSA3LjQ0LS4xNyAxMC4wNC0uMDEuNjcuMDMgMS4yNS0uMDQgMS43My0uMjEuNDctLjE3Ljg2LS40MyAxLjE3LS43OWwuMDItLjAyYy4zNi0uNDIuNjUtLjk4Ljg3LTEuNjYuMjMtLjcxLjM4LTEuNTYuNDYtMi41NCAwLTguNCAyLjA4LTIxLjU3IDIuOTQtMzAuNDMgMC0uMDYgMC0uMTIuMDEtLjIuMDktLjguMDYtMS40NS0uMS0xLjk2LS4xNS0uNDgtLjQtLjg1LS43NS0xLjEyLS40My0uMzMtMS4wMi0uNTctMS43NC0uNzMtLjc1LS4xNi0xLjY1LS4yNC0yLjY3LS4yNGwtLjE0LjAxSDk5Ljc4Yy0uMDMgMC0uMDYgMC0uMDktLjAxLS43Ni4wMS0xLjQxLjA4LTEuOTUuMjMtLjUzLjE1LS45NS4zNi0xLjI3LjY1LS4xMy4xMS0uMjQuMjQtLjMzLjM5LS4wOS4xNS0uMTcuMy0uMjQuNDd6TTg0LjQgNzguNTFhMi4wMjYgMi4wMjYgMCAwIDEtLjUzLS45NUw2OC4zOCA0OS42OGMtLjgtMS4zMy0xLjUzLTIuMDEtMi4yMi0yLjI0LS42NC0uMjEtMS4yNy0uMDMtMS45MS4zNS0uNTEuMy0xLjA0LjctMS41OCAxLjE1LS41Ny40OC0xLjEyLjk4LTEuNjcgMS40OGwtLjEuMDljLS42NS41OS0xLjMgMS4xOC0xLjg1IDEuNjRsLTIuNjcgMi4yLS4wNS4wNGMtLjk4Ljc4LTIuMDIgMS4zOS0zLjA3IDEuODMtMS4xMi40Ni0yLjI2Ljc0LTMuMzcuODMtLjcxLjA2LTEuNDIuMDQtMi4xMS0uMDVzLTEuMzYtLjI2LTEuOTktLjVjLS42Ni0uMjUtMS4yOS0uNTgtMS44Ni0uOTgtLjU1LS4zOS0xLjA1LS44Ni0xLjQ4LTEuMzktLjQ4LS42LS44OC0xLjI4LTEuMTctMi4wNC0uMjgtLjcyLS40Ni0xLjUyLS41NC0yLjM3di0uMTJjMC0uMjIuMDMtLjQ1LjEtLjY2LjA4LS4yNC4yLS40OC4zOC0uNjlsNy43My05LjJjMS4wMS45MSAyLjA4IDEuNzUgMy4yIDIuNTJsLTcuMjEgOC41OGMuMDYuMjQuMTQuNDcuMjMuNjguMTIuMjguMjguNTMuNDYuNzZsLjAxLjAyYTMuNjg3IDMuNjg3IDAgMCAwIDEuNTcgMS4xYy4zNC4xMy43Mi4yMSAxLjExLjI2aC4wMWMuMzkuMDQuOC4wNSAxLjIyLjAyLjcxLS4wNiAxLjQ2LS4yNCAyLjE5LS41NS43LS4yOSAxLjQtLjcgMi4wNS0xLjIzbDIuNjYtMi4yYy41Ni0uNDYgMS4wNS0uOSAxLjUyLTEuMzNsLjMxLS4yOGMuNjItLjU3IDEuMjQtMS4xNCAxLjg3LTEuNjYuMTEtLjA5LjIyLS4xOS4zNC0uMjggMS43NC0uNjggMy40LTEuNDYgNC45Ny0yLjM1LjUzLS4wNCAxLjA2IDAgMS42LjE0IDEuNjMuNDIgMy4yMyAxLjcyIDQuOCA0LjM1IDUuMjYgOC43MiAxMC4yNSAxOC40NSAxNS4yNCAyNy40Mmg0LjQyVjQyLjk5YzAtLjA1IDAtLjEuMDEtLjE3IDAtLjI0LjAxLS40OC4wMi0uNzMuMDEtLjE1LjAyLS4zLjA0LS40NGwtNS4xMi0zLjRjLS4zNi0uMjQtLjc0LS41LTEuMTMtLjc3bC0xLjMtLjkyYy0yLjI5LTEuNi00LjY0LTMuMjQtNy4wOS00LjI4LjcyLTEuMTMgMS4zOS0yLjMyIDItMy41Ny44Ni4zOSAxLjcuODIgMi41MiAxLjMgMS43MyAxIDMuMzggMi4xNSA0Ljk5IDMuMjlsLjA5LjA3Yy42OS40OCAxLjM4Ljk3IDIuMTggMS41IDEuNDcuOTUgMi45MyAxLjk2IDQuNCAyLjk0bC4xMy0uMTVjLjE0LS4xNi4zLS4zMi40OC0uNDcuNzItLjY0IDEuNTktMS4xMiAyLjYtMS40NC45OC0uMzEgMi4wOS0uNDYgMy4zMy0uNDcuMDMtLjAxLjA2LS4wMS4wOS0uMDEgMy41Ny4xNiA3LjU1LS4yNSAxMS4wNS4wMSAxLjQyIDAgMi43LjEzIDMuODQuNDEgMS4xOC4yOSAyLjIuNzUgMy4wNCAxLjRhNi4wMiA2LjAyIDAgMCAxIDIuMDUgMi43OWMuNCAxLjExLjUzIDIuNDIuMzUgMy45Ni0xLjI4IDkuOTItMS45OCAyMC40Ni0yLjk1IDMwLjQ3LS4xMSAxLjQxLS4zNiAyLjY2LS43NCAzLjc3LS4zOSAxLjExLS45MiAyLjA1LTEuNTkgMi44My0uNzMuODQtMS42MSAxLjQ4LTIuNjQgMS44OC0xLjAxLjQtMi4xNi41OC0zLjQ3LjUyLTMuMjEgMC02LjQ5LjA3LTkuNjkgMGE3LjEyIDcuMTIgMCAwIDEtMi40My0uMjljLS43OC0uMjQtMS40OS0uNjItMi4xNC0xLjE0bC0uMDItLjAyYy0uNDYtLjM4LS44OC0uODEtMS4yNi0xLjMyLS4zMy0uNDMtLjYyLS45LS44OS0xLjQyaC0zLjJjLjE2LjYyLjI0IDEuMjMuMjUgMS44My4wMi44NC0uMTEgMS42NS0uMzYgMi40MS0uMjQuNzQtLjU5IDEuNDMtMS4wMyAyLjA1LS40Ni42NS0xLjAxIDEuMjItMS42MyAxLjcxbC0uMDMuMDJjLS41OS40Ni0xLjI0Ljg1LTEuOTIgMS4xNi0uNjkuMy0xLjQyLjUzLTIuMTcuNjUtLjc1LjEzLTEuNTIuMTUtMi4yOC4wN2E3Ljg5IDcuODkgMCAwIDEtMS44OC0uNDRjLS43NC43NC0xLjUgMS4zNi0yLjI3IDEuODUtLjg3LjU1LTEuNzcuOTUtMi42OCAxLjIxcy0xLjg0LjM1LTIuNzcuMzFjLS44My0uMDQtMS42NS0uMi0yLjQ4LS40Ni0uODEuODctMS42NiAxLjU4LTIuNTYgMi4xMy0uOTguNjEtMi4wMSAxLjA0LTMuMDkgMS4yNy0xLjEuMjQtMi4yNC4yOC0zLjQxLjExLTEuMDctLjE2LTIuMTgtLjQ5LTMuMzEtLjk5LS4zMS4yMy0uNjIuNDQtLjk1LjYzYTkuNTYzIDkuNTYzIDAgMCAxLTMuMDkgMS4xN2MtLjYzLjExLTEuMjcuMTYtMS45My4xNC0xLjU1LS4wNS0yLjg1LS4zLTMuOTgtLjczYTkuMjkzIDkuMjkzIDAgMCAxLTIuOTMtMS44Yy0uOC0uNzEtMS40Ni0xLjUyLTIuMDctMi40MS0uNi0uODctMS4xNS0xLjgyLTEuNzQtMi44NGwtNi40Ny0xMS4yOWgtNC40NmMtLjE1LjYzLS4zMyAxLjIyLS41NiAxLjc2YTguMDUgOC4wNSAwIDAgMS0xLjA0IDEuODFjLS43LjkxLTEuNTcgMS42LTIuNjIgMi4wNi0xLjAzLjQ1LTIuMjQuNjgtMy42NC42NWgtOC44NGMtMS4xNi4xOC0yLjI1LjEzLTMuMjQtLjItMS4wMi0uMzMtMS45My0uOTUtMi43My0xLjg3LS43LS44MS0xLjI4LTEuODYtMS43NC0zLjE4LS40NS0xLjI5LS43OC0yLjg1LS45Ny00LjY5bC0uMDItLjE2TC4xNyA0NC40MWMtLjIzLTEuNTktLjIyLTIuOTYuMDItNC4xMi4yNC0xLjIuNzEtMi4xOSAxLjM4LTMgLjY4LS44MiAxLjUzLTEuNDEgMi41Mi0xLjgxLjk2LS4zOSAyLjA2LS42IDMuMjctLjY1bC4xMi0uMDFoMTEuOTVjLjA0IDAgLjA3IDAgLjEuMDEgMS4xMS0uMDEgMi4xNS4wOCAzLjA5LjI5IDEgLjIyIDEuODkuNTcgMi42NyAxLjA3LjYzLjQxIDEuMTguOSAxLjYzIDEuNDkuMzguNS42OCAxLjA3LjkxIDEuNzFoOS4xNGMxLjE4LS43OSAyLjMzLTEuNSAzLjQ5LTIuMTEgMS4yMS0uNjMgMi40Mi0xLjE2IDMuNzEtMS41N2wuMDItLjAxYy40My0uMTMuODctLjI1IDEuMzEtLjM2IDEuMDQgMS4zMSAyLjE3IDIuNTEgMy4zOCAzLjYtLjQzLjAyLS44NS4wNy0xLjI1LjEzLS43OC4xMS0xLjUyLjI4LTIuMjQuNTEtMS4xLjM0LTIuMTcuODItMy4yNCAxLjM5LTEuMDguNTgtMi4xOCAxLjI3LTMuMzIgMi4wNmEyLjA3NiAyLjA3NiAwIDAgMS0xLjIzLjQxaC05LjI5djE3Ljk5bC4wNCAxMS4zM2g1LjIxYy4zNiAwIC43Mi4xIDEuMDMuMjguMy4xNy41NS40My43NC43NUw0Mi40IDg2LjFjLjUxLjg5Ljk5IDEuNzIgMS40OCAyLjQ0LjQ4LjcxLjk3IDEuMzIgMS41IDEuOC40OS40NCAxLjA2LjggMS43NSAxLjA1bC4wMi4wMWMuNy4yNSAxLjUzLjQgMi41NC40My4zNy4wMS43NC0uMDIgMS4xLS4wOC4zNS0uMDYuNjktLjE2IDEuMDItLjMuMi0uMDguNDEtLjE5LjYyLS4zLjA5LS4wNS4xOC0uMTEuMjctLjE2LTEuNDYtMi43My0yLjk1LTUuNDYtNC4zOS04LjItLjI2LS40OS0uMjktMS4wNC0uMTQtMS41My4xNS0uNDkuNDktLjkzLjk4LTEuMTlsLjA2LS4wM2MuNDgtLjI0IDEuMDItLjI4IDEuNS0uMTMuNDkuMTUuOTIuNDkgMS4xOS45NyAxLjY0IDMuMDYgMy4yOCA2LjEyIDQuOTEgOS4xOC44My40MSAxLjYzLjY4IDIuMzcuODIuNzguMTQgMS41Mi4xNCAyLjIyLS4wMS42My0uMTQgMS4yNS0uNCAxLjg1LS43OC41My0uMzMgMS4wNC0uNzYgMS41NS0xLjI4TDU3Ljc4IDc3LjljLS4zLS40Ny0uMzgtMS4wMi0uMjctMS41My4xMS0uNTEuNDItLjk3Ljg5LTEuMjcuNDctLjMgMS4wMi0uMzggMS41My0uMjcuNS4xMS45Ny40MiAxLjI3Ljg5bDcuNDcgMTEuNzNjLjU3LjIyIDEuMTMuMzUgMS42Ny40LjU4LjA1IDEuMTUgMCAxLjctLjE1bC4wMi0uMDFjLjUzLS4xNSAxLjA2LS4zOSAxLjYtLjc0LjQ2LS4zLjkyLS42OCAxLjM5LTEuMTNsLTYuNjktMTIuNmEyLjAzNCAyLjAzNCAwIDAgMSAuODMtMi43MmwuMDUtLjAzYTIuMDUgMi4wNSAwIDAgMSAxLjUzLS4xNGMuNDkuMTUuOTIuNDkgMS4xOS45N0w3OSA4NC41NGMuMzYuMTkuNzUuMzIgMS4xNC4zOC40Ny4wOC45Ni4wOCAxLjQzIDAgLjQtLjA3LjgtLjE5IDEuMTgtLjM1LjM4LS4xNy43NS0uMzggMS4wNy0uNjMuMzItLjI1LjYtLjU0LjgyLS44Ni4yMS0uMjkuMzgtLjYyLjQ5LS45NS4xMi0uMzkuMTgtLjgxLjE1LTEuMjZhNC41NiA0LjU2IDAgMCAwLS4zMy0xLjM2bC0uNTUtMXpNMTQuMDcgNjYuMzVjLjcxIDAgMS4zNi4yOSAxLjgzLjc2YTIuNTg2IDIuNTg2IDAgMCAxIDAgMy42NmwtLjAzLjAzYTIuNTg2IDIuNTg2IDAgMCAxLTMuNjMtLjAzIDIuNTg2IDIuNTg2IDAgMCAxIDAtMy42NmMuNDctLjQ4IDEuMTItLjc2IDEuODMtLjc2em05MS42NSAwYy43MSAwIDEuMzYuMjkgMS44My43NmEyLjU4NiAyLjU4NiAwIDAgMSAwIDMuNjYgMi41ODYgMi41ODYgMCAwIDEtMy42NiAwIDIuNTg2IDIuNTg2IDAgMCAxIDAtMy42NmwuMDMtLjAzYy40Ny0uNDYgMS4xLS43MyAxLjgtLjczem0tODEuNS04LjY2LS4wNi0xNi4zMmMtLjA3LS40My0uMi0uNzktLjM4LTEuMDgtLjE3LS4yOS0uNC0uNTItLjY3LS42OS0uNC0uMjYtLjktLjQ0LTEuNS0uNTUtLjYxLS4xMi0xLjMtLjE3LTIuMDYtLjE2LS4wMy4wMS0uMDcuMDEtLjExLjAxLTMuOTUgMC03Ljk3LjA3LTExLjkxIDAtLjY3LjAzLTEuMjYuMTMtMS43NC4zLS40Ni4xNi0uODMuMzktMS4wOC43LS4yOC4zMy0uNDcuOC0uNTYgMS40My0uMS42Ny0uMDcgMS41Mi4wOCAyLjU2IDEuMDQgNy43OCAyLjIxIDIxLjEzIDIuMzIgMjguOS4xNSAxLjQ0LjM4IDIuNjEuNjggMy41NS4yOS45MS42NSAxLjU5IDEuMDYgMi4wNy4yOS4zNC42NC41NiAxLjAzLjY3LjQxLjEyLjg3LjEyIDEuMzguMDNsLjE4LS4wMy4wNy0uMDFjLjA0LS4wMS4wNy0uMDEuMTEtLjAxaDguODhjLjA2IDAgLjEzIDAgLjIxLjAxLjcuMDEgMS4zLS4wOSAxLjc4LS4yOS40Ny0uMTkuODUtLjQ3IDEuMTMtLjg1LjM2LS40Ni42My0xLjA2LjgxLTEuNzkuMTktLjczLjI5LTEuNTguMzMtMi41NGwtLjAxLS4wOVY1Ny44NmMwLS4wNi4wMS0uMTIuMDMtLjE3eiIgc3R5bGU9ImZpbGw6IzI2MjYyNiIvPgogICAgPHBhdGggZD0iTTYwLjI3IDBjNi43NCA0LjI3IDEyLjgyIDYuMjkgMTguMDUgNS44MS45MSAxOC40Ni01LjkgMjkuMzUtMTcuOTggMzMuOS0uMDgtLjAzLS4xNS0uMDYtLjIzLS4wOS0uMDguMDMtLjE1LjA2LS4yMy4wOUM0Ny44IDM1LjE3IDQwLjk5IDI0LjI3IDQxLjkgNS44MWM1LjIyLjQ4IDExLjMxLTEuNTQgMTguMDUtNS44MWwuMTYuMTIuMTYtLjEyek00OS4zMiAxOC4xOWwzLjk0LS4wNS4zLjA3Yy44LjQ2IDEuNTQuOTggMi4yNSAxLjU4LjUxLjQzLjk5Ljg5IDEuNDQgMS40IDEuNDEtMi4yNyAyLjkyLTQuMzYgNC41MS02LjI4IDEuNzQtMi4xIDIuODMtMy4yNiA0Ljc3LTVsLjM4LS4xNWg0LjNsLS44Ny45NmMtMi42NiAyLjk2LTQuMzMgNS4yNy02LjUxIDguNDJhODkuNzI2IDg5LjcyNiAwIDAgMC01Ljg4IDkuNzdsLS41NCAxLjA0LS41LTEuMDZjLS45Mi0xLjk3LTIuMDEtMy43Ny0zLjMyLTUuMzhhMjEuNTQ2IDIxLjU0NiAwIDAgMC00LjYxLTQuMjZsLjM0LTEuMDZ6IiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZmlsbDojNTFiNTNjIi8+Cjwvc3ZnPg==';
            $this->icon_data_uri = 'data:image/svg+xml;base64,' . $icon_base64;

            add_action('admin_menu', [$this, 'trustify_reviews_menu']);
            add_action('admin_init', [$this, 'trustify_reviews_settings']);
        }

        public function trustify_reviews_menu() {
            add_menu_page(
                'Trustify Reviews',
                'Trustify Reviews',
                'manage_options',
                'trustify-reviews',
                [$this, 'trustify_reviews_settings_page'],
                $this->icon_data_uri,
                99
            );
        }

        public function trustify_reviews_settings_page() {
?>
            <div class="wrap">

                <h1><img width='30' src="<?php echo $this->icon_data_uri; ?>" /> Trustify Reviews</h1>
                <form method="post" action="options.php">
                    <?php
                    settings_fields('trustify_reviews_settings');
                    do_settings_sections('trustify_reviews_settings');
                    submit_button();
                    ?>
                </form>
            </div>
<?php
        }

        public function trustify_reviews_settings() {
            register_setting('trustify_reviews_settings', 'trustify_reviews_settings');
            add_settings_section('trustify_reviews_settings_section', 'Settings', [$this, 'trustify_reviews_settings_section_callback'], 'trustify_reviews_settings');
            // add_settings_field('trustify_reviews_settings_api_key', 'API Key', [$this, 'trustify_reviews_settings_api_key_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            add_settings_field('trustify_reviews_settings_business_id', 'Business ID', [$this, 'trustify_reviews_settings_business_id_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_name', 'Business Name', [$this, 'trustify_reviews_settings_business_name_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_address', 'Business Address', [$this, 'trustify_reviews_settings_business_address_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_phone', 'Business Phone', [$this, 'trustify_reviews_settings_business_phone_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_email', 'Business Email', [$this, 'trustify_reviews_settings_business_email_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_website', 'Business Website', [$this, 'trustify_reviews_settings_business_website_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_logo', 'Business Logo', [$this, 'trustify_reviews_settings_business_logo_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_logo_width', 'Business Logo Width', [$this, 'trustify_reviews_settings_business_logo_width_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_logo_height', 'Business Logo Height', [$this, 'trustify_reviews_settings_business_logo_height_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_logo_alt', 'Business Logo Alt', [$this, 'trustify_reviews_settings_business_logo_alt_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
            // add_settings_field('trustify_reviews_settings_business_logo_title', 'Business Logo Title', [$this, 'trustify_reviews_settings_business_logo_title_callback'], 'trustify_reviews_settings', 'trustify_reviews_settings_section');
        }

        public function trustify_reviews_settings_section_callback() {
            echo 'Enter your settings below:';
        }

        public function trustify_reviews_settings_api_key_callback() {
            $options = get_option('trustify_reviews_settings');
            $api_key = isset($options['api_key']) ? $options['api_key'] : '';
            echo '<input type="text" class="regular-text" id="trustify_reviews_settings_api_key" name="trustify_reviews_settings[api_key]" value="' . $api_key . '" />';
        }

        public function trustify_reviews_settings_business_id_callback() {

            $options = get_option('trustify_reviews_settings');
            $business_id = isset($options['business_id']) ? $options['business_id'] : '';
            echo '<input type="text" class="regular-text" id="trustify_reviews_settings_business_id" name="trustify_reviews_settings[business_id]" placeholder="62835855486917834877667559591936" value="' . $business_id . '" />';
        }

        // public function trustify_reviews_settings_business_name_callback() {
    }
}


new TRUSTIFY_REVIEWS_SETTINGS();
