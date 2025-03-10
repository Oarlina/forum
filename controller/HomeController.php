<?php
namespace Controller;

use App\DAO;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class HomeController extends AbstractController implements ControllerInterface {

    public function index(){
        return [
            "view" => VIEW_DIR."home.php",
            "meta_description" => "Page d'accueil du forum"
        ];
    }
        
    public function users(){
        // $this->restrictTo("ROLE_USER");

        $manager = new UserManager();
        $users = $manager->findAllOrderByRole();
        // ['register_date', 'DESC']

        return [
            "view" => VIEW_DIR."security/users.php",
            "meta_description" => "Liste des utilisateurs du forum",
            "data" => [ 
                "users" => $users 
            ]
        ];
    }

    public function changeRoleAdminToUser($id_user){
        $manager = new UserManager();
        $users = $manager->findAllOrderByRole();
        $sql= "UPDATE user u
                SET u.role = 'user'
                WHERE id_user = :id_user";
        DAO::update($sql, ['id_user' =>$id_user]);
        $this->redirectTo("home","users");
    }
    public function changeRoleUserToAdmin($id_user){
        $manager = new UserManager();
        $users = $manager->findAllOrderByRole();
        $sql= "UPDATE user u
                SET u.role = 'admin'
                WHERE id_user = :id_user";
        DAO::update($sql, ['id_user' =>$id_user]);
        $this->redirectTo("home","users");
    }
}
