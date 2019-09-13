<?php
    $errors = '';
    // $myemail = 'info@choyoursmile.com';
    $myemail = 'meteor_swarm@hotmail.com';    // email for testing

    if (empty($_POST['appointment_name']) || empty($_POST['appointment_phone'])) {
        $errors .= "\n Error: Selected fields are required!";
    }

    if (empty($errors)) {
        $name = $_POST['appointment_name'];
        $address = $_POST['appointment_address'];
        $city = $_POST['appointment_city'];
        $province = $_POST['appointment_prov'];
        $postal_code = $_POST['appointment_postal'];
        $phone = $_POST['appointment_phone'];
        $email = $_POST['appointment_email'];

        $current_patient = $_POST['appointment_current'];

        $best_time_morning = $_POST['appointment_time_morning'];
        $best_time_noon = $_POST['appointment_time_noon'];
        $best_time_afternoon = $_POST['appointment_time_afternoon'];
        $best_time_evening = $_POST['appointment_time_evening'];

        $preferred_day_any = $_POST['appointment_day_any'];
        $preferred_day_mon = $_POST['appointment_day_mon'];
        $preferred_day_tue = $_POST['appointment_day_tue'];
        $preferred_day_wed = $_POST['appointment_day_wed'];
        $preferred_day_thu = $_POST['appointment_day_thu'];
        $preferred_day_fri = $_POST['appointment_day_fri'];
        
        $preferred_time_any = $_POST['appointment_ptime_any'];
        $preferred_time_morning = $_POST['appointment_ptime_morning'];
        $preferred_time_afternoon = $_POST['appointment_ptime_afternoon'];

        $description = $_POST['appointment_desc'];

        $to = $myemail; 
        $email_subject = "Contact form submission: $name";
        $email_body = "You have received a new appointment request. Here are the details:\n\n".
        "Name: $name \n Phone#: $phone \n Email: $email \n".
        "Address: $address $city $province $postal_code \n\n".
        "Current Patient: $current_patient \n\n";

        $best_time = '';
        if ($best_time_morning == 'MORNING') {
            $best_time .= 'Morning / ';
        }
        if ($best_time_noon == 'NOON') {
            $best_time .= 'Noon / ';
        }
        if ($best_time_afternoon == 'AFTERNOON') {
            $best_time .= 'Afternoon / ';
        }
        if ($best_time_evening == 'EVENING') {
            $best_time .= 'Evening / ';
        }
        $best_time_str = substr($best_time, 0, -3);
        $email_body .= "Best time(s) to call: $best_time_str \n\n";

        $pref_day_str = '';
        if ($preferred_day_any == 'ANY') {
            $pref_day_str .= 'Any';
        } else {
            $pref_day = '';
            if ($preferred_day_mon == 'MON') {
                $pref_day .= 'Monday / ';
            }
            if ($preferred_day_tue == 'TUE') {
                $pref_day .= 'Tuesday / ';
            }
            if ($preferred_day_wed == 'WED') {
                $pref_day .= 'Wednesday / ';
            }
            if ($preferred_day_thu == 'THU') {
                $pref_day .= 'Thursday / ';
            }
            if ($preferred_day_fri == 'FRI') {
                $pref_day .= 'Friday / ';
            }
            $pref_day_str = substr($pref_day, 0, -3);
        }
        $email_body .= "Preferred Day: $pref_day_str \n\n";

        $pref_time_str = '';
        if ($preferred_time_any == 'ANY') {
            $pref_time_str .= 'Any';
        } else {
            if ($preferred_time_morning == 'MORNING') {
                $pref_time_str .= 'Morning';
            } else if ($preferred_time_afternoon == 'AFTERNOON') {
                $pref_time_str .= 'Afternoon';
            }
        }
        $email_body .= "Preferred Time: $pref_time_str \n\n";

        $email_body .= "Nature of the appointment: \n";
        if ($description != '') {
            $email_body .= "$description \n\n";
        } else {
            $email_body .= "N/A \n\n";
        }
        
        $headers = "From: $myemail\n"; 
        $headers .= "Reply-To: $email";
        
        // echo nl2br($to);
        // echo nl2br($email_subject);
        // echo nl2br($email_body);
        // echo nl2br($headers);

        if (mail($recipient, $subject, $message, $headers))
        {
            echo "Message accepted";
        }
        else
        {
            echo "Error: Message not accepted";
        }

        // header('Location: ../views/main.html');
        
    } else {
        echo nl2br($errors);
    }
?>
