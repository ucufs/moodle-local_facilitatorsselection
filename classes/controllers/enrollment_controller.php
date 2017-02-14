<?php

namespace psf\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use psf\models\enrollment;
use psf\models\edict;
use stdClass;

class enrollment_controller
{

    function index()
    {
        global $templating;

        $edict = new edict();
        $edicts = $edict->get_edict();

        foreach ($edicts as $obj) {
            $obj->has_vacancies = $edict->has_vacancies($obj->id);
            $obj->has_criterias = false;
        }

        return $templating->render('enrollment/index-html.php', array('edicts' => $edicts));
    }

    function enrollment($id, $role_id = null)
    {
        global $templating;

        $enrollment = new enrollment();
        $enrollment->role_id = ($role_id != null) ? $role_id : '';

        $obj = new edict();
        $edict = $obj->get_edict($id);

        $roles = $enrollment->local_psf_get_select_functions($id);
        $courses = $enrollment->local_psf_get_select_courses($id, $role_id);

        $coord_presential = false;
        $campi = null;
        if ($role_id)
        {
            $coord_presential = $enrollment->is_coursecoordinatorpresential($role_id);
            if ($coord_presential) 
            {
                $campi = $enrollment->get_campi($role_id, $id);
            }
        }
        
        return $templating->render('enrollment/enrollment-html.php', array('enrollment' => $enrollment, 'roles' => $roles, 'courses' => $courses, 'edict' => $edict, 'coord_presential' => $coord_presential, 'campi' => $campi));
    }

    function register(Request $request, $edict_id)
    {
        global $templating;
        $enrollment = new enrollment();

        #$enrollmentnumber = $enrollment->local_psf_get_enrollment_number();
        $enroll = new stdClass();
        $enroll->rolename = $enrollment->local_psf_get_role_name($request->get('role_id'));
        $enroll->coursename = $enrollment->local_psf_get_course_name($request->get('course_id'));
        $enroll->cpf = $request->get('cpf');
        $enroll->siape = $request->get('siape');

        $obj = new edict();
        $edict = $obj->get_edict($edict_id);

        return $templating->render('enrollment/register-html.php', array('enroll' => $enroll, 'edict' => $edict));
    }

    function completion()
    {
        include __DIR__ . '/../../views/enrollment/completion-html.php';
        return '';
    }

    function receipt()
    {
        include __DIR__ . '/../../views/enrollment/receipt-html.php';
        return '';
    }


}
