<?php

/**
 * Formulario de inicio de sesion
 *
 * @package    Roraima
 * @subpackage autenticacion
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32813 2009-09-08 16:19:47Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class loginActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {


    $this->getUser()->setAttribute('error', 'Inicializado');
  if ($this->getUser()->isAuthenticated())
  {
    $this->getUser()->loginOut();
    $this->getUser()->setAttribute('error', 'Usuario Logout');  
  }else
  {
    $this->getUser()->setAttribute('error', 'Usuario Sin Autenticar');
  }

  $c = new Criteria();
  $c->addDescendingOrderByColumn(EmpresaUserPeer::CODEMP);
  $lista_emp = EmpresaUserPeer::doSelect($c);

  $this->empresas = array();

  foreach($lista_emp as $obj_emp)
  {
    $this->empresas += array($obj_emp->getCodemp() => $obj_emp->getNomemp());
  } 

  }

  public function executeLogin()
  {
     $valverfir='';
     $varemp=sfConfig::get('app_configemp');
     if ($varemp)
       if(array_key_exists('generales',$varemp))
         if(array_key_exists('valverfir',$varemp['generales']))   
           $valverfir=$varemp['generales']['valverfir'];
           
    if ($valverfir=='S') {
      //Validar Version de firefox
      $navegador = H::get_user_browser();
      $version=H::gbversion();
      if ($navegador=='firefox' && $version!=3.6)
      {
         $this->setFlash('notice', 'La versión del Firefox debe ser igual a 3.6');
         $this->redirect('login');
      }else {
            // Verificar y validar al usuario con
          // la información del formulario
          $user = $this->getUser();
          if (!$user->isAuthenticated())
          {
            $n = $this->getRequestParameter('textnombre','tabla');
            $p = $this->getRequestParameter('textpasswd', 'passwd');
            $emp = $this->getRequestParameter('selectemp', 'empresa');


            if($user->loginIn($n,$p,$emp,$cred))
            {
              $user->setAttribute('error','Usuario Autenticado');
              $this->logMessage(Constantes::Autenticacion.'Usuario Autenticado = '.$user->getAttribute('usuario').', Schema = '.$user->getAttribute('schema').', IP = '.$this->getRequest()->getHttpHeader('addr','remote'), 'info');
              if($user->getAttribute('urlreferente','')!='') $this->redirect($user->getAttribute('urlreferente',''));
              else $this->redirect('principal');
              $user->getAttributeHolder()->remove('urlreferente');
            }
            else
            {
               $numint='3';
               if ($cred=='1') 
                      $this->setFlash('notice', '(Combinación de Usuario y Contraseña errado.)');          
               else if ($cred=='2')
                   $this->setFlash('notice', 'Error al autenticar. El Nombre de Usuario no coincide con el Login registrado.');
               else if ($cred=='3')
                   $this->setFlash('notice', 'Error al autenticar. La Clave esta Caducada.');
               else if ($cred=='4')
                   $this->setFlash('notice', 'Combinación de Usuario y Contraseña errado. Al 3er intento se bloqueara el Usuario');
               else if ($cred=='5')
                   $this->setFlash('notice', 'Combinación de Usuario y Contraseña errado. Usuario Bloqueado');
               else if ($cred=='6')
                   $this->setFlash('notice', 'Usuario Bloqueado');
               else if ($cred=='7')
                   $this->setFlash('notice', 'Usuario no Registrado');
               else if ($cred=='8')
                 $this->setFlash('notice', 'Combinación de Usuario y Contraseña errado. Al '.$numint.' intento se bloqueara el Usuario');
               else
                   $this->setFlash('notice', 'Usuario No Autenticado.');

               $this->redirect('login');

            }

          }else {
            //$user->setAttribute('error','Error al autenticar');
            $this->redirect('principal');
        }
      }
    }
    else {

        // Verificar y validar al usuario con
      // la información del formulario
      $user = $this->getUser();
      if (!$user->isAuthenticated())
      {
        $n = $this->getRequestParameter('textnombre','tabla');
        $p = $this->getRequestParameter('textpasswd', 'passwd');
        $emp = $this->getRequestParameter('selectemp', 'empresa');


        if($user->loginIn($n,$p,$emp,$cred))
        {
          $user->setAttribute('error','Usuario Autenticado');
          $this->logMessage(Constantes::Autenticacion.'Usuario Autenticado = '.$user->getAttribute('usuario').', Schema = '.$user->getAttribute('schema').', IP = '.$this->getRequest()->getHttpHeader('addr','remote'), 'info');
          if($user->getAttribute('urlreferente','')!='') $this->redirect($user->getAttribute('urlreferente',''));
          else $this->redirect('principal');
          $user->getAttributeHolder()->remove('urlreferente');
        }
        else
        {
           $numint='3';
           if ($cred=='1') 
                  $this->setFlash('notice', 'Error al autenticar.Combinación de Usuario y Contraseña errado.');          
           else if ($cred=='2')
               $this->setFlash('notice', 'Error al autenticar.El Nombre de Usuario no coincide con el Login registrado.');
           else if ($cred=='3')
               $this->setFlash('notice', 'Error al autenticar.La Clave esta Caducada.');
           else if ($cred=='4')
               $this->setFlash('notice', 'Combinación de Usuario y Contraseña errado.Al 3er intento se bloqueara el Usuario');
           else if ($cred=='5')
               $this->setFlash('notice', 'Combinación de Usuario y Contraseña errado.Usuario Bloqueado');
           else if ($cred=='6')
               $this->setFlash('notice', 'Usuario Bloqueado');
           else if ($cred=='7')
               $this->setFlash('notice', 'Usuario no Registrado');
           else if ($cred=='8')
             $this->setFlash('notice', 'Combinación de Usuario y Contraseña errado.Al '.$numint.' intento se bloqueara el Usuario');
           else
               $this->setFlash('notice', 'Usuario No Autenticado.');

           $this->redirect('login');

        }

      }else {
        //$user->setAttribute('error','Error al autenticar');
        $this->redirect('principal');
    }
  }

  }

  public function executeLogout()
  {

    // Verificar y validar al usuario con
  // la información del formulario
  $user = $this->getUser();
  if ($user->isAuthenticated())
  {
    $usu = $this->getRequestParameter('usuario', 'usuario');

    if($user->loginOut())
    {
      $user->setAttribute('error','Usuario Sin Autenticar');
      $this->logMessage(Constantes::Autenticacion.'Usuario Sesion Cerrada = '.$usu.' Schema = '.$user->getAttribute('schema'), 'info');
    }
    session_unset();

  }

  $this->redirect('login');
  return sfView::SUCCESS;

  }

  public function executeErrorautenticacion()
  {

  }

}
