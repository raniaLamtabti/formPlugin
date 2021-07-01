<?php
/*
Plugin Name: Form Plugin
Plugin URI: 
Description: Form Plugin for brief
Author: RANIA
Author URI: 
Version: 0.1
*/


add_action("admin_menu", "addMenu");
function addMenu()
{
  add_menu_page("Form creator", "Form creator", 4, "Form_creator", "formMenu" );
  add_submenu_page("Form_creator", "Show result", "Show result", 4, "Form-Show-Result", "showResult");
}

function formMenu()
{
    $fields = getFields();
    ?>
    <div class="content">    
        <form method="post" action="">
            <div class="input-content">
                <input type="checkbox" id="fName" name="fName" value="true" <?php echo $fields->fName == 1 ? 'checked' : '' ?>>
                <label for="">First Name</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="lName" name="lName" value="true" <?php echo $fields->lName == 1 ? 'checked' : '' ?>>
                <label for="">Last Name</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="email" name="email" value="true" <?php echo $fields->email == 1 ? 'checked' : '' ?>>
                <label for="">Email</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="subj" name="subj" value="true" <?php echo $fields->subject == 1 ? 'checked' : '' ?>>
                <label for="">Subject</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="msg" name="msg" value="true" <?php echo $fields->message == 1 ? 'checked' : '' ?>>
                <label for="">Message</label>
            </div>
            <div class="input-content">
                <button type="submit" name="formFields">Create</button>
            </div>
        </form>
        <div class="preview">
            <input type="text" class="input displayInput" id="fNameP" placeholder="first name">
            <input type="text" class="input displayInput" id="lNameP" placeholder="last name">
            <input type="text" class="input displayInput" id="emailP" placeholder="email">
            <input type="text" class="input displayInput" id="subjP" placeholder="subject">
            <textarea id="msgP" class="input displayInput" id="" cols="30" rows="10" placeholder="message"></textarea>
        </div>
    </div>
    <?php
    echo 'shortcod : ' . '[go_contact]';
}

function showResult()
{
    $data = getData();
    ?>
    <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Subject</td>
                <td>Message</td>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($data as $datum){
            ?>
            <tr>
                <td><?php echo $datum->fName ?></td>
                <td><?php echo $datum->lName ?></td>
                <td><?php echo $datum->email ?></td>
                <td><?php echo $datum->subject ?></td>
                <td><?php echo $datum->message ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}


function formCode()
{
    getFields();
    echo '<form action="" method="post">';

    if (getFields()->fName) {

        echo 'Your Name (required) <br />';
        echo '<input type="text" name="fName" size="40" /><br>';
    }
    if (getFields()->lName) {

        echo 'Your Name (required) <br />';
        echo '<input type="text" name="lName" size="40" /><br>';
    }
    if (getFields()->email) {

        echo 'Your Email (required) <br />';
        echo '<input type="email" name="email" size="40" /><br>';
    }
    if (getFields()->subject) {

        echo 'Subject (required) <br />';
        echo '<input type="text" name="subject" size="40" /><br>';
    }
    if (getFields()->message) {

        echo 'Your Message (required) <br />';
        echo '<textarea rows="10" cols="35" name="message"></textarea><br>';
    }

    echo '<p><input type="submit" name="send" value="Send"/></p>';
    echo '</form>';
}


function fieldsTable()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $tablename = 'fields';
    $sql = "CREATE TABLE $wpdb->base_prefix$tablename (
        id INT,
        fName BOOLEAN,
        lName BOOLEAN,
        email BOOLEAN,
        subject BOOLEAN,
        message BOOLEAN
        ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    maybe_create_table($wpdb->base_prefix . $tablename, $sql);
}

function insertFields()
{
    global $wpdb;
    $wpdb->insert(
        $wpdb->base_prefix.'fields',
        [
            'id' => 1,
            'fname' => true,
            'lname' => true,
            'email' => true,
            'subject' => true,
            'message' => true
        ]
    );
}

function getFields()
{
    global $wpdb;
    $tablename = 'fields';
    $fields = $wpdb->get_row("SELECT * FROM $wpdb->base_prefix$tablename WHERE id = 1;");
    return $fields;
}

function dataTable()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $tablename = 'data_form';
    $sql = "CREATE TABLE $wpdb->base_prefix$tablename (
         id INT AUTO_INCREMENT,
        fName varchar(255) DEFAULT null,
        lName varchar(255) DEFAULT null,
        email varchar(255) DEFAULT null,
        subject varchar(255) DEFAULT null,
        message varchar(255) DEFAULT null,
        PRIMARY key(id)
        ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    maybe_create_table($wpdb->base_prefix . $tablename, $sql);
}


if (isset($_POST['formFields'])) {
    $fName = filter_var($_POST['fName'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $lName = filter_var($_POST['lName'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $email = filter_var($_POST['email'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $subject = filter_var($_POST['subj'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $message = filter_var($_POST['msg'] ?? false, FILTER_VALIDATE_BOOLEAN) ;

    global $wpdb;
    $wpdb->update(
        $wpdb->base_prefix.'fields',
        [
            'fName' => $fName,
            'lName' => $lName,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ],
        ['id' => 1]
    );
}

function cf_shortcode()
{
    ob_start();
    formCode();

    return ob_get_clean();
}

if (isset($_POST['send'])) {
    $arr = $_POST;
    unset($arr['send']);

    global $wpdb;

    $wpdb->insert(
        $wpdb->base_prefix.'data_form',
        $arr
    );
}

function getData()
{
    global $wpdb;
    $tablename = 'data_form';
    $data = $wpdb->get_results("SELECT * FROM $wpdb->base_prefix$tablename");
    return $data;
}
function main_script()
{   
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'main.js' ); 
    wp_enqueue_style( 'main-style',  plugin_dir_url( __FILE__ ) . 'style.css', [], time(), 'all' );
}

add_action('admin_enqueue_scripts', 'main_script');

add_shortcode('go_contact', 'cf_shortcode');

register_activation_hook(__FILE__, 'fieldsTable');
register_activation_hook(__FILE__, 'insertFields');
register_activation_hook(__FILE__, 'dataTable');