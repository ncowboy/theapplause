<?php
add_action('wp_ajax_ajax_events', 'my_ajax_events');
add_action('wp_ajax_nopriv_ajax_events', 'my_ajax_events');
function my_ajax_events()
{

    if (!wp_verify_nonce($_POST['ajax_events'], 'ajax_events')) {
        echo json_encode([
            'status' => 0,
            'mess' => 'Ошибка запроса',
            'action' => 'alert'
        ]);
        die();
    }
    $functionName = $_POST['events_method'];
    if (function_exists($functionName)) {
        call_user_func($functionName);
    } else {
        echo json_encode([
            'status' => 0,
            'mess' => 'Ошибка запроса',
            'action' => 'alert'
        ]);


    }
    die();
}

function form_function($events_method)
{
    wp_nonce_field('ajax_events', 'ajax_events');
    ?>
    <input type="hidden" name="action" value="ajax_events">
    <input type="hidden" name="events_method" value="<?= $events_method ?>">
    <?
}

//action
function share_action()
{
      $post_id=(int)$_POST['post_id'];
      $spread= get_post_meta($post_id,'spread',true);
      $spread=(int)((empty($spread))?0:$spread);
      $spread= $spread+1;
      add_post_meta( $post_id, 'spread', $spread, true ) or update_post_meta( $post_id, 'spread',$spread );

        echo json_encode([
            'status' => 1, 
            'action' => 'update_block',
            'selector' => '*[data-share]',
            'html'=> $spread
        ]);

}
function form_block(){
  


 
$data = array(
    'title'=>'Заголовок формы',
    "name" => 'Имя', 
    "phone" => 'Телефон', 

    
);
$mess = "";
$mess = "<table>";
foreach ($data as $key => $title) {
    if (isset($_POST[$key])) {
        $value = (is_array($_POST[$key])) ? json_encode($_POST[$key]) : $_POST[$key];
        $mess .= "
        <tr>
            <td>{$title}</td>
            <td>{$value}</td>
        </tr>";
    }
}

 

$mess .= "<table>";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$to=get_option('admin_email ');
 
     wp_mail($to,strip_tags($_POST['title']) , $mess, $headers);
 

   echo json_encode([
            'status' => 1, 
            'action' => 'update_block',
            'selector' => '.form_block .ajax',
            'html'=> '<p class="title">Ваша заявка принята! Администратор свяжется с Вами.</p>'
        ]);

}