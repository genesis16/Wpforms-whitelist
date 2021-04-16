/*
 * Whitelist email domains from your WPForms.
 *
 * @link https://wpforms.com/developers/how-to-restrict-email-domains/
 *
*/
function wpf_whitelist_domains( $field_id, $field_submit, $form_data ) {
    $domain          = substr( strrchr( $field_submit, "@" ), 1 );
    $whitelist       = array( 'icloud.com', 'me.com' );
    if( ! in_array( $domain, $whitelist ) ) { 
        wpforms()->process->errors[ $form_data['id'] ][ $field_id ] = esc_html__( 'Email domain not accepted!', 'wpforms' );
        return;
    }
}
add_action('wpforms_process_validate_email', 'wpf_whitelist_domains', 10, 3 );