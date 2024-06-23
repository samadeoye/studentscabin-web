<?php
namespace StudentsCabin\Param;

class Param
{
    public static function getRequestParams($action)
    {
        $data = [];
        switch($action)
        {
            case 'registerStudent':
                $data = [
                    'firstName' => [
                        'method' => 'post',
                        'length' => [3,100],
                        'label' => 'First Name',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'lastName' => [
                        'method' => 'post',
                        'length' => [3,100],
                        'label' => 'Last Name',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'dateOfBirth' => [
                        'method' => 'post',
                        'length' => [10,10],
                        'label' => 'Date of Birth',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'emailAddress' => [
                        'method' => 'post',
                        'length' => [13,200],
                        'label' => 'Email Address',
                        'required' => true,
                        'type' => 'string',
                        'is_email' => true
                    ],
                    'whatsappPhone' => [
                        'method' => 'post',
                        'length' => [7,15],
                        'label' => 'WhatsApp Phone Number',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'stateOfOrigin' => [
                        'method' => 'post',
                        'length' => [3,30],
                        'label' => 'State of Origin',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'nameOfSchool' => [
                        'method' => 'post',
                        'length' => [3,200],
                        'label' => 'Name of School',
                        'required' => true
                    ],
                    'courseOfStudy' => [
                        'method' => 'post',
                        'length' => [3,100],
                        'label' => 'Course of Study',
                        'required' => true
                    ],
                    'joinReason' => [
                        'method' => 'post',
                        'length' => [3,0],
                        'label' => 'Reason for Joining',
                        'required' => true
                    ],
                    'yearOfStudyId' => [
                        'method' => 'post',
                        'length' => [1,1],
                        'label' => 'Year of Study',
                        'required' => true
                    ],
                    'meansOfAwarenessId' => [
                        'method' => 'post',
                        'length' => [3,0],
                        'label' => 'Means of Awareness',
                        'required' => true
                    ],
                    'referralEmail' => [
                        'method' => 'post',
                        'length' => [13,200],
                        'label' => 'Referral Email'
                    ],
                    'g-recaptcha-response' => [
                        'method' => 'post',
                        'length' => [10,0],
                        'label' => 'Recaptcha',
                        'required' => true
                    ],
                ];
            break;

            case 'addPartnership':
                $data = [
                    'organizationName' => [
                        'method' => 'post',
                        'length' => [3,250],
                        'label' => 'Organization Name',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'contactPersonName' => [
                        'method' => 'post',
                        'length' => [3,150],
                        'label' => 'Contact Person Name',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'position' => [
                        'method' => 'post',
                        'length' => [3,150],
                        'label' => 'Position',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'emailAddress' => [
                        'method' => 'post',
                        'length' => [13,200],
                        'label' => 'Email Address',
                        'required' => true,
                        'type' => 'string',
                        'is_email' => true
                    ],
                    'phone' => [
                        'method' => 'post',
                        'length' => [7,15],
                        'label' => 'Phone',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'organizationAddress' => [
                        'method' => 'post',
                        'length' => [3,30],
                        'label' => 'Organization Address',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'website' => [
                        'method' => 'post',
                        'length' => [10,250],
                        'label' => 'Website'
                    ],
                    'partnershipTypesIds' => [
                        'method' => 'post',
                        'length' => [0,0],
                        'label' => 'Partnership Types',
                        'required' => true
                    ],
                    'organizationDesc' => [
                        'method' => 'post',
                        'length' => [20,0],
                        'label' => 'Organization Description',
                        'required' => true
                    ],
                    'supportDesc' => [
                        'method' => 'post',
                        'length' => [10,0],
                        'label' => 'Support Description',
                        'required' => true
                    ],
                    'g-recaptcha-response' => [
                        'method' => 'post',
                        'length' => [10,0],
                        'label' => 'Recaptcha',
                        'required' => true
                    ],
                ];
            break;

            case 'addDonation':
                $data = [
                    'fullName' => [
                        'method' => 'post',
                        'length' => [7,150],
                        'label' => 'Full Name',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'emailAddress' => [
                        'method' => 'post',
                        'length' => [13,200],
                        'label' => 'Email Address',
                        'required' => true,
                        'type' => 'string',
                        'is_email' => true
                    ],
                    'phone' => [
                        'method' => 'post',
                        'length' => [7,15],
                        'label' => 'Phone',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'donationAmount' => [
                        'method' => 'post',
                        'length' => [3,0],
                        'label' => 'Donation Amount',
                        'required' => true,
                        'type' => 'string'
                    ],
                    'donationFrequencyId' => [
                        'method' => 'post',
                        'length' => [6,0],
                        'label' => 'Donation Frequency',
                        'required' => true,
                    ],
                    'receiveUpdates' => [
                        'method' => 'post',
                        'length' => [1,1],//yes or no
                        'label' => 'Receive Updates',
                        'required' => true
                    ],
                    'donationMessage' => [
                        'method' => 'post',
                        'length' => [0,0],
                        'label' => 'Donation Message',
                        'required' => true
                    ],
                    'g-recaptcha-response' => [
                        'method' => 'post',
                        'length' => [10,0],
                        'label' => 'Recaptcha',
                        'required' => true
                    ],
                ];
            break;

            case 'sendContactMessage':
                $data = [
                    'fullName' => [
                        'method' => 'post',
                        'length' => [7,150],
                        'label' => 'Full Name',
                        'required' => true
                    ],
                    'email' => [
                        'method' => 'post',
                        'length' => [13,150],
                        'label' => 'Email',
                        'required' => true
                    ],
                    'phone' => [
                        'method' => 'post',
                        'length' => [6,16],
                        'label' => 'Phone Number',
                        'required' => true
                    ],
                    'subject' => [
                        'method' => 'post',
                        'length' => [3,200],
                        'label' => 'Subject',
                        'required' => false
                    ],
                    'message' => [
                        'method' => 'post',
                        'length' => [10,0],
                        'label' => 'Message',
                        'required' => true
                    ],
                    'g-recaptcha-response' => [
                        'method' => 'post',
                        'length' => [10,0],
                        'label' => 'Recaptcha',
                        'required' => true
                    ]
                ];
            break;

            case 'exportSubmissions':
                $data = [
                    'moduleId' => [
                        'method' => 'post',
                        'length' => [3,0],
                        'label' => 'Module',
                        'required' => true
                    ],
                    'adminPassCode' => [
                        'method' => 'post',
                        'length' => [5,0],
                        'label' => 'Admin Pass Code',
                        'required' => true
                    ]
                ];
            break;
        }
        return $data;
    }
}