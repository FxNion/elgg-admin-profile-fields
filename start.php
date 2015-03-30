<?php

    /*
     * In this fucntion we setup the profile fields.
     * Those who begin with the suffix admin_ could be filled
     * through datatransfer from an external back-office for example.
     * 
     * Admin fields are all visible in the user profiles.
     *           
     * Admins, when editing th profile, will be abble to edit them, but
     * standards members no.     
     *                         
     * Feel free to add or modify theses samples fields, and to edit also
     * the translations files in this module directory.
     * 
     * Enjoy.               
     *     
     */                    
		function admin_profile_fields_setup()
		{
			global $CONFIG;
			
			$profile_defaults = array (
				'location' => 'tags',
				'skills' => 'tags',
				'briefdescription' => 'text',
				'description' => 'longtext',
				'interests' => 'tags',
				
				'contactemail' => 'email',
				'phone' => 'text',
				'mobile' => 'text',
				'website' => 'url',
				
				'admin_service_name' => 'tags',
        'admin_manager' => 'tags',
        'admin_office_address' => 'text',
			  'admin_office_phone' => 'text',
			  'admin_office_interests' => 'tags',
			);
		
			$CONFIG->profile = $profile_defaults;
			$CONFIG->profile_admin_prefix = 'admin_';
		
		}
		
		
		register_elgg_event_handler('init','system','admin_profile_fields_setup',10000); // Ensure this runs after other plugins
		
?>
