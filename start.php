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
			
			
			// TODO: ne pas écraser les champs de profil par défaut
			$profile_defaults = array (
				'location' => 'tags',
				'skills' => 'tags',
				'briefdescription' => 'text',
				'description' => 'longtext',
				'interests' => 'tags',
				
				'contactemail' => 'email',
				'phone' => 'text',
				'mobile' => 'text',
				'website' => 'url'
			);

			$profile_admin = array (
				
				'admin_service_name' => 'tags',
				'admin_manager' => 'tags',
				'admin_office_address' => 'text',
				'admin_office_phone' => 'text',
				'admin_office_interests' => 'tags',
			);
			
			$profile_fields = elgg_get_config('profile_fields');

			if (is_array($profile_fields) && count($profile_fields) > 0) {
				$profile_fields= $profile_fields + $profile_admin;
			}else{
				$profile_fields= $profile_defaults + $profile_admin;
			}
			elgg_set_config('profile_fields',$profile_fields);
			elgg_set_config('profile_admin_prefix','admin_');
		
		}
		
						
		function admin_profile_init() {
			admin_profile_fields_setup();
		}
		
		elgg_register_event_handler('init', 'system', 'admin_profile_init', 100000);
		
?>
