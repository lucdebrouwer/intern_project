<?php 

class Permissions
{
    private $canEditProducts = false;
    private $canRemoveProducts = false;
    private $canAddProducts = false;
    private $canSeeInventory = false;
    private $canApproveRequest = false;
    private $canDenyRequest = false;

    public function checkUserRole($role)
    {
        // role 1 = docent
        if($role == 1) 
        {
            $this->canSeeInventory = true;
            $this->canApproveRequest = true;
            $this->canDenyRequest = true;
        }

        else if($role == 2) 
        {
            $this->canEditProducts = true;
            $this->canRemoveProducts = true;
            $this->canAddProducts = true;
        }
        else {
            throw new Exception("Acces denied");
        }
        // role 2 = stagiar / beheerder
    }
}
?>
