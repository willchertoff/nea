<?php
/**
* Display admin fields for user options or custom post meta
* @package Traction
* @subpackage TractionInput
*
* Arrays constructed for each field in this way:
* @param string 'name' the displayed title of the field
* @param string 'desc' helper description beneath title of the field
* @param string 'id' the custom field unique identifier
* @param string 'std' often the placeholder
* @param string 'type' the input type (text | textarea | hidden | checkbox | select | radio |
* password | textareacode | repeatable | number | range | date | week | month |
* datetime | url | email | color)
* as well as WP-specific helpers to convert into inputs: (tinymce | media | posts | pages |
* categories | users)
* traction specific: (icons | socialcheckbox | map)
* HTML helpers: (separate | customnotice | clearfix | endarray)
* @param string|boolean 'def' the default text or value of the field
* @param array 'options' to be applied for radio or select fields. Constructed in this way:
*** @param array for each option
****** @param string 'name' the front-facing label for the option
****** @param string 'id' the unique identifier
****** @param string 'image' absolute path of image to display above radio option (not applicable to select fields)
*/
class TractionInput {

  /**
  * Field values
  * @param array $meta accepts specifics of meta field
  */
  private $meta;

  /**
  * Retrieve pre-set values
  * @param object $value accepts values of meta field as int, string, boolean or array
  */
  private $value;

  /**
  * Establish preceding HTML
  * @param string $initial HTML values before rendering of adminfield
  */
  private $initial;

  /**
  * Establish antecedent HTML
  * @param string $finish HTML values after rendering of adminfield
  */
  private $finish;

  public function __construct($meta,$value) {
    $this->meta = $meta;
    $this->value = $value;
    $this->initial = '<div class="option '.$this->value['type'].' ';
    if(isset($this->value['class']))
      $this->initial .= $this->value['class'];
    $this->initial .= '">
      <div class="label">';
    if(!empty($this->value['name'])) $this->initial .= $this->value['name'];
    if(!empty($this->value['desc'])) $this->initial .= '<span class="desc">'.$this->value['desc'].'</span>';
    $this->initial .= '</div>
      <div class="cell">';
    $this->finish = '</div></div>';
  }

  /**
  * Show a text field
  */
  public function text() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="text" id="'.$this->value['id'].'" value="';
    if(!empty($this->meta))
      $html .= htmlspecialchars($this->meta);
    $html .= '"';
    if(!empty($this->value['std']))
      $html .= ' placeholder="'.htmlspecialchars($this->value['std']).'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a textarea
  */
  public function textarea(){
    $html = $this->initial;
    $html .= '<textarea name="'.$this->value['id'].'" type="'.$this->value['type'].'" cols="18" rows="5"';
    if(isset($this->value['required']))
      $html .= ' required ';
    if ($this->meta == "")
      $html .= 'placeholder="'.htmlspecialchars(stripslashes($this->value['std'])).'"';
    $html .= '>';
    if ($this->meta != "")
      $html .= htmlspecialchars(stripslashes($this->meta));
    $html .= '</textarea>';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Render a hidden field
  */
  public function hidden() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="hidden" id="'.$this->value['id'].'" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display a checkbox field
  */
  public function checkbox(){
    if(isset($this->value['class']))
      $class = $this->value['class'];
    else
      $class = '';
    $html = '<div class="option checkbox '.$class.'">
    <div class="cell">
      <label class="label">
        <input type="checkbox" name="'.$this->value['id'].'"';
      if($this->meta)
        $html .= ' checked ';
      $html .= ' />'.$this->value['name'].'<span class="desc">'.$this->value['desc'].'</span>
      </label>
    </div>
    </div>';
    echo $html;
  }

  /**
  * Display a select box
  */
  public function select(){
    $html = $this->initial;
    $html .= '<select name="' . $this->value['id'] . '">';
    foreach ($this->value['options'] as $opt) {
      $html .= '<option value="'.$opt['id'].'">'.$opt['name'].'</option>';
    }
    $html .= '</select>';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display a radio select box
  */
  public function radio(){
    $html = $this->initial;
    foreach ($this->value['options'] as $opt) {
      if(isset($opt['image']))
        $html .= '<div class="radio-image">';
      $html .= '<label>';
      if(isset($opt['image']))
        $html .= '<img src="'.$opt['image'].'" />';
      $html .= '<input name="'.$this->value['id'].'" type="radio" value="'.$opt['id'].'"';

      //If meta has it as checked or the opt
      if(!$this->meta && $opt['id'] == $this->value['def'] xor $this->meta == $opt['id'])
        $html .= 'checked="checked"';
      $html .= '/>';
      $html .= '&nbsp;&nbsp;'.$opt['name'].'</label>&nbsp;&nbsp;';
      if(isset($opt['image']))
        $html .='</div>';
    }
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a password field
  */
  public function password() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="password" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a textarea explicitly intended for code input (characters are escaped with stripslashes)
  */
  public function textareacode(){
    $html = $this->initial;
    $html .= '<textarea name="'.$this->value['id'].'" type="'.$this->value['type'].'" cols="18" rows="5"';
    if(isset($this->value['required']))
      $html .= ' required';
    $html .= '>';
      if ($this->meta != "")
        $html .= stripslashes($this->meta);
      else
        $html .= stripslashes($this->value['std']);
      $html .= '</textarea>';
      $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a repeatable field
  */
  public function repeatable() {
    $html = $this->initial;
    $html .= '<a class="repeatable-add button" href="#">+</a>
    <ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
    $i = 0;
    if($this->meta) {
      foreach(unserialize($this->meta) as $row) {
        $html .= '<li class="repeatable-holder">
        <input type="text" name="'.$this->value['id'].'['.$i.']" id="'.$this->field['id'].'" value="'.htmlspecialchars($row).'" /><a class="repeatable-remove button" href="#">-</a></li>';
        $i++;
      }
    } else {
      $html .= '<li class="repeatable-holder">
      <input type="text" name="'.$this->value['id'].'['.$i.']" id="'.$this->field['id'].'" value="'.htmlspecialchars($row).'" /><a class="repeatable-remove button" href="#">-</a></li>';
    }
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a number field
  */
  public function number() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="number" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native range input field
  */
  public function range() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="range" min="'.$this->value['min'].'" max="'.$this->value['max'].'" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native date field
  */
  public function date() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="date" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native week picker field
  */
  public function week() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="week" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native month field
  */
  public function month() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="month" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native datetime field
  */
  public function datetime() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="datetime" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native URL field
  */
  public function url() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="url" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native telephone field
  */
  public function tel() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="tel" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native email field
  */
  public function email() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="email" data-type="email" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    $html .= '" placeholder="'.$this->value['std'].'" ';
    if(isset($this->value['required']))
      $html .= 'required data-required="true"';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a native color picker field
  */
  public function color() {
    $html = $this->initial;
    $html .= '<input name="'.$this->value['id'].'" type="count" value="';
    if ($this->meta != "")
      $html .= $this->meta;
    else
      $html .= $this->value['std'];
    $html .= '"';
    if(isset($this->value['required']))
      $html .= ' required';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Show a rich editor field
  */
  public function tinymce(){
    echo $this->initial;
      if ($this->meta != "")
        $val = html_entity_decode(stripcslashes($this->meta));
      else
        $val = html_entity_decode(stripcslashes($this->value['std']));
    wp_editor( $val, $this->value['id'], array( 'textarea_name' => $this->value['id'], 'media_buttons' => true, 'textarea_rows' => 12, 'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,spellchecker,wp_adv' ) ) );
    echo $this->finish;
  }

  /**
  * Display a media upload button that hooks into the WordPress media library/rich uploader
  */
  public function media(){
    $html = $this->initial;
    $html .= '<input type="button" class="custom_media_upload button button-large" value="Add Media" />
      <img class="custom_media_image" src="';
      if($this->meta)
        $html .= $this->meta;
      else
        $html .= $this->value['std'] ? $this->value['std'] : '';
      $html .= '" />
    <input class="custom_media_url" type="text" name="'.$this->value['id'].'" value="';
    $html .= $this->meta ? $this->meta : $this->value['std'];
    $html .= '" placeholder="http://example.com/media.png"';
    if(isset($this->value['required']))
      $html .= ' required ';
    $html .= ' />';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display a select field with populated with a list of posts
  */
  public function posts(){
    $html = $this->initial;
    $html .= '<select name="'.$this->value['id'].'"';
    if(isset($this->value['required']))
      $html .= ' required ';
    $html .= '>
      <option value="">'.__('Select One', 'trwp').'</option>';
      $rps = wp_get_recent_posts();
      foreach ($rps as $recent) {
        $html .= '<option value="'.$recent["ID"].'"';
          if($this->meta == $recent["ID"])
            $html .= 'selected="selected"';
          $html .= '>'.$recent["post_title"].'
        </option>';
      }
    $html .= '</select>';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display a select field with populated with a list of pages
  */
  public function pages(){
    $html = $this->initial;
    $html .= wp_dropdown_pages(array('echo' => 0, 'name' => $this->value['id'], 'selected' => $this->meta, 'show_option_none' => __('Select One', 'trwp')));
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display a select field with populated with a list of categories
  */
  public function categories(){
    $html = $this->initial;
    $query = array('hide_empty' => 0, 'echo' => 0, 'name' => $this->value['id'], 'selected' => $this->meta, 'hierarchical' => true, 'show_option_none' => __('Select One', 'trwp'));
    if(isset($this->value['taxonomy']))
      $query['taxonomy'] = $this->value['taxonomy'];
    if(isset($this->value['tax']))
      $query['taxonomy'] = $this->value['tax'];
    $html .= wp_dropdown_categories($query);
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display a select field with populated with a list of users
  */
  public function users(){
    $html = $this->initial;
    $html .= wp_dropdown_users(array('echo' => 0, 'name' => $this->value['id'], 'selected' => $this->meta, 'hierarchical' => true, 'show_option_none' => __('Select One', 'trwp')));
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display an icon picker select menu
  */
  public function icons(){
    $icons = array('home', 'heart', 'heart-empty', 'refresh', 'repeat', 'print', 'cog', 'comments', 'check', 'ok', 'remove', 'microphone', 'reorder', 'support', 'phone', 'alert', 'code', 'tie', 'presentation', 'paperclip', 'file', 'loop', 'pencil', 'pencil2', 'calendar', 'link', 'film', 'quotes-left', 'map', 'envelope', 'play2', 'image', 'tags', 'tag', 'greenhosting', 'lightbulb', 'plus', 'minus', 'location', 'bell', 'users', 'user', 'export', 'share', 'clock', 'sound', 'arrow-left', 'mobile', 'folder', 'star', 'star2', 'thumbs-up', 'thumbs-down', 'shuffle', 'pictures', 'camera', 'music', 'info', 'help', 'archive', 'aid', 'automobile', 'law', 'factory', 'food', 'arrow-up', 'copyright', 'foodtray', 'office', 'building', 'library', 'wrench', 'wrench2', 'cart', 'globe', 'users', 'chair', 'dollar', 'dollar2', 'pig', 'retail', 'parts', 'money', 'handshake', 'handshake1');
    $html = $this->initial;
    $html .= '<div class="list-icon-wrapper">';
    $html .= '<div class="preview-icons">';
    if($this->meta)
      $html .= '<i class="icon-'.$this->meta.'"></i> '.ucfirst(str_replace('-', ' ', $this->meta));
    else
      $html .= __('Select One', 'trwp');
    $html .= ' <i class="icon-angle-down"></i></div>';
    $html .= '<ul class="list-icons" data-name="'.$this->meta.'"';
    if(isset($this->value['required']))
      $html .= ' required ';
    $html .= '>';
      foreach ($icons as $icon) {
        $html .= '<li data-value="'.$icon.'"';
        if($this->meta == $icon)
          $html .= ' data-selected="selected"';
        $html .= '><i class="icon-'.$icon.'"></i> ' . ucfirst(str_replace('-', ' ', $icon)) . '</li>';
      }
    $html .= '</ul>';
    $html .= '<input class="hidden-icons" type="hidden" name="'.$this->value['id'].'" value="'.$this->meta.'" />';
    $html .= '</div>';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Display a checkbox with social icons (for admin options page only)
  */
  public function socialcheckbox(){
    if(isset($this->value['class']))
      $class = $this->value['class'];
    else
      $class = '';
    $html = '<div class="option checkbox socialbox '.$class.'">
      <div class="cell">
        <label class="label">
          <input type="checkbox" name="'.$this->value['id'].'"';
          if($this->meta)
            $html .= ' checked ';
          $html .= ' />
          <i class="social-ico-'.$this->value['desc'].'" style="font-size:22px"></i> '.$this->value['name'].'
        </label>
      </div>
    </div>';
    echo $html;
  }

  /**
  * Display a Google map and store lat/lng coordinates
  */
  public function map(){
    $html = '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places,geometry"></script>';
    $html .= $this->initial;
    $html .= '<script type="text/javascript">jQuery(document).ready(function(){';
    if($this->meta)
      $html .= 'mapsload('.$this->meta.',"#'.$this->value['id'].'");';
    else
      $html .= 'mapsload();';
    $html .= '});</script><input type="hidden" name="'.$this->value['id'].'" id="'.$this->value['id'].'" value="'.$this->meta.'" />
      <div id="residence_map" style="width:500px; height:200px;"></div>';
    $html .= $this->finish;
    echo $html;
  }

  /**
  * Administrative: Start a new meta box set
  */
  public function separate(){
    $html = '<div class="postbox clearfix clear">
      <h3 class="hndle">'.$this->value['name'].'</h3>
      <div class="inside">';
    echo $html;
  }

  /**
  * Administrative: Inject custom HTML
  */
  public function customnotice(){
    $html = $this->value['std'];
    echo $html;
  }

  /**
  * Administrative: Reset columned fields (i.e. after four <div class="one-fourth"> fields)
  */
  public function clearfix(){
    $html = '<input type="hidden" name="clearfix" /><div class="clearfix"></div>';
    echo $html;
  }

  /**
  * Administrative: Round out the end of the postbox class
  */
  public function endarray(){
    $html = '</div>
    </div>';
    echo $html;
  }
}

/**
* Add custom meta to posts and pages
* @package Traction
* @subpackage TractionMetaBoxes
*/
class TractionMetaBoxes {

  /**
  * Load in meta fields
  * @param array $meta_fields
  */
  private $meta_fields;

  /**
  * Meta box display information, like title
  * @param array $meta_information
  * @param string $meta_information['title'] Post box title
  * @param string $meta_information['post_type'] accepts registered custom post type
  * @param string $meta_information['priority'] ranking = high | low | normal
  * @param string $meta_information['display'] meta box positioning = high | low | normal
  */
  private $meta_information;

  public function __construct($meta_fields, $meta_information) {
    $this->meta_fields = $meta_fields;
    $this->meta_information = $meta_information;
    add_action('add_meta_boxes', array($this, '_add_traction_meta_box') );
    add_action('save_post', array($this, '_save_traction_box_meta') );
  }

  /**
  * Call the actual meta box WP function
  */
  public function _add_traction_meta_box() {
    if(!empty($this->meta_information)){
      $this->meta_information['title'] = empty($this->meta_information['title']) ? 'Traction Meta Box' : $this->meta_information['title'];
      $this->meta_information['post_type'] = empty($this->meta_information['post_type']) ? 'post' : $this->meta_information['post_type'];
      $this->meta_information['priority'] = empty($this->meta_information['priority']) ? 'high' : $this->meta_information['priority'];
      $this->meta_information['display'] = empty($this->meta_information['display']) ? 'normal' : $this->meta_information['display'];
    }

    add_meta_box(
      $this->meta_information['slug'],
      $this->meta_information['title'],
      array($this, '_display_traction_meta_box'),
      $this->meta_information['post_type'],
      $this->meta_information['display'],
      $this->meta_information['priority']
    );
  }

  /**
  * Add content to the meta box, like admin fields
  */
  public function _display_traction_meta_box() {

    global $post;
    wp_nonce_field( 'traction_nonce_check', 'traction_meta_box_nonce' );
    echo '<div class="wrap trao clear clearfix" id="poststuff">';
    $globalMeta = get_post_custom($post->ID);
      foreach ($this->meta_fields as $value) {
        if(isset($globalMeta[$value['id']][0]))
          $meta = $globalMeta[$value['id']][0];
        else
          $meta = false;
        $fieldType = $value['type'];
        $newField = new TractionInput($meta,$value);
        $newField->$fieldType();
      }
    echo '</div>';

  }

  /**
  * Save custom meta box content
  */
  public function _save_traction_box_meta($post_id) {
    if ( !isset( $_POST['traction_meta_box_nonce'] )  || !wp_verify_nonce($_POST['traction_meta_box_nonce'], 'traction_nonce_check'))
      return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
      return $post_id;
    if ('page' == $_POST['post_type']) {
      if (!current_user_can('edit_page', $post_id))
        return $post_id;
      } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($this->meta_fields as $field) {
      if($field['type'] == 'tax_select') continue;
      $old = get_post_meta($post_id, $field['id'], true);
      if(isset($_POST[$field['id']])){
        $new = $_POST[$field['id']];;
      }
      if($field['type'] == 'checkbox' && !isset($_POST[$field['id']])){
        $new = '';
      }
      if ($new && $new != $old) {
        update_post_meta($post_id, $field['id'], $new);
      } elseif ('' == $new && $old) {
        delete_post_meta($post_id, $field['id'], $old);
      }
    }
  }

}

?>