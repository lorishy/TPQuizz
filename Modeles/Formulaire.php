<?php 

class Form {

    private $entourDivDebut = 'div class="mb-3"';
    private $entourDivFin = 'div';
    
    private function entourer($html)
    {
        return "<{$this->entourDivDebut}> $html </{$this->entourDivFin}>";
    }

    public function inputPseudo($pseudo)
    {
        return $this->entourer('<input type="text" class="form-control" id="pseudo" placeholder="Nom" name="' . $pseudo . '">');
        
    }

    public function inputEmail($email)
    {
        return $this->entourer('<input type="email" class="form-control" id="e-mail" placeholder="E-mail" name="' . $email . '">');
        
    }

    public function inputMdp($mdp)
    {
        return $this->entourer('<input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="' . $mdp . '">');
        
    }

    public function inputConfirmMdp($confirmMdp)
    {
        return $this->entourer('<input type="password" class="form-control" id="confirm_mdp" placeholder="Confirmer votre mot de passe" name="' . $confirmMdp . '">');
        
    }

    public function submit($submit)
    {
        return '<button class="btn btn-primary" type="submit" name="' . $submit . '">Envoyer</button>';
    }
}