<?php

/** Make sure to append the vendor file before using this */
use PixelSequel\Model\Model;
use PixelSequel\Schema\Schema;
session_start();
/**
 * Edugrant core backend
 * Written by Jacqueline Wanjiru Macharia 
 * 2024
*/

interface MediaHandler
{
    public static function Upload ( $file, string $folder="", $tmp="",array $formats=[]);
    public static function Delete ( string $file);
}

final class FileHandler implements MediaHandler
{
    public static $file;

    public function __construct()
    {

    }
    public static function Upload ( $file, string $folder="", $tmp="",array $formats=[])
    {

        $filename = basename($file);
        $path = $folder.$filename;
        self::$file = $filename;
        $extension = pathinfo($path,PATHINFO_EXTENSION);

        if (gettype($formats) == "array")
        {
            if (in_array($extension,$formats))
            {
                if (move_uploaded_file($tmp,$path))
                {
                    return true;
                }
                else
                {

                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public static function Delete ( string $file) : bool
    {
        if (file_exists($file))
        {
            if (unlink($file))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}

interface modelHandler
{
    public function __construct();
}


final class Base
{
    public function __construct()
    {

    }
    public static function Signup($username, $email, $phone, $gender, $password)
    {
        new Model (
            dbname: "scholarships"
        );

        Model::Insert(
            table: "users",
            data: [
                "name" => $username,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "phone" => $phone,
                "gender" => $gender,
            ]
        );

    }

    public static function Login($email, $password)
    {
        new Model (
            dbname: "scholarships"
        );

        $user  = Model::All (
           table: "users",
           where: [
                "email" => $email
           ],
            limit: 1
        );

        $user = (json_decode( (string) $user));

        if (password_verify($password, $user[0]->password))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function AllUsers()
    {
        new Model (
            dbname: "scholarships"
        );

        $users = Model::All (
            table: "users",
            order_by: "id",
            order: "DESC"
        );

        return $users;
    }

    public static function getUser($id)
    {
        new Model (
            dbname: "scholarships"
        );

        $user = Model::All (
            table: "users",
            where: [
                "id" => $id
            ],
            limit: 1
        );

        return json_decode( (string) $user);
    }

    public static function DeleteUser($id)
    {
        new Model (
            dbname: "scholarships"
        );

        Model::Delete (
            table: "users",
            param_t: "id",
            param_n: $id
        );
    }

    public static function AllScholarships()
    {
        new Model (
            dbname: "scholarships"
        );

        $scholarships = Model::All (
            table: "scholarships"
        );

        return json_decode( (string) $scholarships);
    }

    public static function getScholarship($id)
    {
        new Model (
            dbname: "scholarships"
        );

        $scholarship = Model::All (
            table: "scholarships",
            where: [
                "id" => $id
            ],
            limit: 1
        );

        return json_decode( (string) $scholarship);
    }

    public static function DeleteScholarship($id)
    {
        new Model (
            dbname: "scholarships"
        );

        Model::Delete (
            table: "scholarships",
            param_t: "id",
            param_n: $id
        );
    }

    public static function AddScholarship($course_type, $course_name, $campus_id, $description, $slots)
    {
        new Model (
            dbname: "scholarships"
        );

        Model::Insert (
            table: "scholarships",
            data: [
                "course_type" => $course_type,
                "course" => $course_name,
                "campus_id" => $campus_id,
                "description" => $description,
                "slots" => $slots
            ]
        );

    }

    public static function AllCampuses()
    {
        new Model (
            dbname: "scholarships"
        );

        $campuses = Model::All (
            table: "campuses"
        );

        return json_decode( (string) $campuses);
    }

    public static function getCampus($id)
    {
        new Model (
            dbname: "scholarships"
        );

        $campus = Model::All (
            table: "campuses",
            where: [
                "id" => $id
            ],
            limit: 1
        );

        return json_decode( (string) $campus);
    }

    public static function AllApplications()
    {
        new Model (
            dbname: "scholarships"
        );

        $applications = Model::All (
            table: "applications"
        );

        return $applications;
    }

    public static function AllScholarshipApplications($scholarship_id)
    {
        new Model (
            dbname: "scholarships"
        );

        $applications = Model::All (
            table: "applications",
            where: [
                "scholarship_id" => $scholarship_id
            ]
        );

        return $applications;
    }


    public static function AddCampus($name, $logo)
    {
        new Model (
            dbname: "scholarships"
        );

        Model::Insert(
            table: "campuses",
            data: [
                "campus_name" => $name,
                "campus_logo" => $logo
            ]
        );
    }

    public static function GetApplication($id)
    {
        new Model (
            dbname: "scholarships"
        );

        $application = Model::All (
            table: "applications",
            where: [
                "id" => $id
            ],
            limit: 1
        );

        return json_decode( (string) $application);
    }


    public static function GetApplications()
    {
        new Model (
            dbname: "scholarships"
        );

        $applications = Model::All (
            table: "applications"
        );

        return json_decode( (string) $applications);
    }

    public static function DeleteApplication($id)
    {
        new Model (
            dbname: "scholarships"
        );

        Model::Delete (
            table: "applications",
            param_t: "id",
            param_n: $id
        );
    }

}


?>
