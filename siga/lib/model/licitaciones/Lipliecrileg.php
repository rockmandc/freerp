<?php

/**
 * Subclase para representar una fila de la tabla 'lipliecrileg'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lipliecrileg extends BaseLipliecrileg
{    

    public function afterHydrate()
    {
        if(self::getLimita()=='S')
            $this->limit=true;
        else
            $this->limit=false;
    }

    public function getDescri()
    {
        return H::GetX('Codcri','Liasplegcrieva','Descri',$this->codcri);
    }
}
