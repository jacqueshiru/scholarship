<?php
session_start();

require "../vendor/autoload.php";

use PixelSequel\Model\Model;
use PixelSequel\Schema\Schema;

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

    public function __construct()
    {

    }
    public static function Upload ( $file, string $folder="", $tmp="",array $formats=[])
    {

        $filename = basename($file);
        $path = $folder.$filename;
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

        if (Model::Insert(
            table: "users",
            data: [
                "name" => $username,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "phone" => $phone,
                "gender" => $gender,
            ]
        ))
        {
            $_SESSION['user'] = true;
            $_SESSION['email'] = $email;

            $_SESSION['id'] = Model::All (
                table: "users",
                where: [
                    "email" => $email
                ],
                limit: 1
            )[0]->id;

            return true;
        }
        else
        {
            return false;
        }

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
            $u = Model::All(
                table: "users",
                where: [
                    "email" => $email
                ],
                limit: 1
            )[0]->id;

            $_SESSION['id'] = $u;

            return true;
        }
        else
        {
            return false;
        }
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

    public static function ApplyScholarship($user_id, $results ,$scholarship_id, $proof, $personal_statement, $abilities)
    {
        new Model (
            dbname: "scholarships"
        );

        if (Model::Insert (
            table: "applications",
            data: [
                "user_id" => $user_id,
                "scholarship_id" => $scholarship_id,
                "results" => $results,
                "proof" => $proof,
                "personal_statement" => $personal_statement,
                "abilities" => $abilities
            ]
        ))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getScholarship($id)
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

}


?>
