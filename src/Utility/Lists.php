<?php

/**
  * Central Signing Website
  *
  * Copyright (c) 2006 Cybersense
  *
  * lists.php
  *
  * Contains lists that are commonly used to construct
  * drop down widgets in the interface.
  *
  */



/**
  * Availability List
  *
  */
 namespace App\Utility;


class Lists
{
	
//global $Availability_List, $Availability_Search_List;
public $Availability_List = array(
                             AVAILABILITY_ANYTIME      => 'Anytime',
                             AVAILABILITY_EVE_WKND     => 'Evenings and Weekends',
                             AVAILABILITY_DAYS_ONLY    => 'Days Only',
                             AVAILABILITY_EVE_ONLY     => 'Evenings Only',
                             AVAILABILITY_WKND_ONLY    => 'Weekends Only',
                             AVAILABILITY_OTHER        => 'Other Hours - Explain',
                             AVAILABILITY_TEMP_UNAVAIL => 'Temporarily Unavailable - Explain',
                             AVAILABILITY_INACTIVE     => 'Inactive - Explain',
                          );
public $Availability_Search_List = array(
                                   AVAILABILITY_ANY_ACTIVE   => 'Any Active',
								   AVAILABILITY_ANY          => 'Any',
                                   AVAILABILITY_ANYTIME      => 'Anytime',
                                   AVAILABILITY_EVE_WKND     => 'Evenings and Weekends',
                                   AVAILABILITY_DAYS_ONLY    => 'Days Only',
                                   AVAILABILITY_EVE_ONLY     => 'Evenings Only',
                                   AVAILABILITY_WKND_ONLY    => 'Weekends Only',
                                   AVAILABILITY_OTHER        => 'Other Hours - Explain',
                                   AVAILABILITY_TEMP_UNAVAIL => 'Temporarily Unavailable - Explain',
                                   AVAILABILITY_INACTIVE     => 'Inactive - Explain',
                                );
                          
                          
/**
  * Ratings List
  *
  */
public $Rating_List = array(
                      RATING_EXCELLENT     => 'Excellent',
                      RATING_ABOVE_AVERAGE => 'Above Average',
                      RATING_AVERAGE       => 'Average',
                      RATING_BELOW_AVERAGE => 'Below Average',
                      RATING_POOR          => 'Poor',
                   );
public $Rating_Search_List = array(
                             RATING_ANY           => 'Any',
                             RATING_EXCELLENT     => 'Excellent',
                             RATING_ABOVE_AVERAGE => 'Above Average or Better',
                             RATING_AVERAGE       => 'Average or Better',
                             RATING_BELOW_AVERAGE => 'Below Average or Better',
                             RATING_POOR          => 'Poor or Better',
                          );

                    
                     
/**
  * Employee Type List
  */
public $Employee_Type_List = array(
                       USER_TYPE_SALES   	   	=> 'Sales',
                       USER_TYPE_ADMIN   	   	=> 'Admin',
                       USER_TYPE_SUPERADMIN   	   	=> 'Super-Admin',
                    );

                    
/**
  * Order Source List
  *
  */
public $Order_Source_List = array(
                               ORDER_SOURCE_PHONE   => 'Phone',
                               ORDER_SOURCE_FAX     => 'Fax',
                               ORDER_SOURCE_EMAIL   => 'Email',
                               ORDER_SOURCE_WEBSITE => 'Website',
                            );                    



/**
  * Document Type List
  *
  */
public $Document_Type_List = array(
                               DOCUMENT_TYPE_REFINANCE => 'Refinance',
                               DOCUMENT_TYPE_SECOND_MORTGAGE   => '2nd Mortgage/Equity Line',
                               DOCUMENT_TYPE_BUYER    => 'Buyer',
                               DOCUMENT_TYPE_SELLER    => 'Seller',
                               DOCUMENT_TYPE_OTHER    => 'Other',
                            );       



/**
  * Number of Packages List
  *
  */
public $Number_Packages_List = array(
                               NUMBER_PACKAGES_SINGLE => 'Single',
                               NUMBER_PACKAGES_DOUBLE_SAME_PROPERTY   => 'Double-Same Property',
                               NUMBER_PACKAGES_DOUBLE_DIFFERENT_PROPERTIES    => 'Double&ndash;Different Properties',
                               NUMBER_PACKAGES_OTHER    => 'Other',
                            );                       



/**
  * Package Status List
  *
  */
public $Package_Status_List = array(
                               PACKAGE_STATUS_N_A        => 'N/A',
                               PACKAGE_STATUS_SENT       => 'SENT',
                               PACKAGE_STATUS_RECEIVED   => 'RECEIVED',
                               PACKAGE_STATUS_INCOMPLETE => 'INCOMPLETE',
                            );



/**
  * American State List
  *
  * Useful for creating drop-downs, etc.
  *
  */
public $State_List = array('AL' => 'Alabama',
                    'AK' => 'Alaska',
                    'AZ' => 'Arizona',
                    'AR' => 'Arkansas',
                    'CA' => 'California',
                    'CO' => 'Colorado',
                    'CT' => 'Connecticut',
                    'DE' => 'Delaware',
                    'FL' => 'Florida',
                    'GA' => 'Georgia',
                    'HI' => 'Hawaii',
                    'ID' => 'Idaho',
                    'IL' => 'Illinois',
                    'IN' => 'Indiana',
                    'IA' => 'Iowa',
                    'KS' => 'Kansas',
                    'KY' => 'Kentucky',
                    'LA' => 'Louisiana',
                    'ME' => 'Maine',
                    'MD' => 'Maryland',
                    'MA' => 'Massachusetts',
                    'MI' => 'Michigan',
                    'MN' => 'Minnesota',
                    'MS' => 'Mississippi',
                    'MO' => 'Missouri',
                    'MT' => 'Montana',
                    'NE' => 'Nebraska',
                    'NV' => 'Nevada',
                    'NH' => 'New Hampshire',
                    'NJ' => 'New Jersey',
                    'NM' => 'New Mexico',
                    'NY' => 'New York',
                    'NC' => 'North Carolina',
                    'ND' => 'North Dakota',
                    'OH' => 'Ohio',
                    'OK' => 'Oklahoma',
                    'OR' => 'Oregon',
                    'PA' => 'Pennsylvania',
                    'RI' => 'Rhode Island',
                    'SC' => 'South Carolina',
                    'SD' => 'South Dakota',
                    'TN' => 'Tennessee',
                    'TX' => 'Texas',
                    'UT' => 'Utah',
                    'VT' => 'Vermont',
                    'VA' => 'Virginia',
                    'WA' => 'Washington',
                    'WV' => 'West Virginia',
                    'WI' => 'Wisconsin',
                    'WY' => 'Wyoming');



/**
  * Yes or No List
  *
  * Useful for creating drop-downs, etc.
  *
  */
public $Yes_No_List = array(YES => 'yes',
                     NO => 'no');
                     
/**
  * Yes, No, or Unknown List
  *
  * Useful for creating drop-downs, etc.
  *
  */
public $Yes_No_Unknown_List = array(YES => 'Yes',
                     NO => 'No',
                     UNKNOWN => 'Unknown');


/**
  * IsActive List
  *
  * Useful for creating drop-downs, etc.
  *
  */

public $IsActive_List = array(
                         ISACTIVE_ACTIVE => 'Active',
                         ISACTIVE_INACTIVE => 'Inactive',
                      );


}
?>
