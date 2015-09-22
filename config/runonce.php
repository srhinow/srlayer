<?php
/**
* angepasster Tipp von BugBuster
* @url: https://community.contao.org/de/showthread.php?45946-fileTree-Felder-f%FCr-Contao-3-2-migrieren-in-eigenen-Erweiterungen
*/

class srlayerRunonceJob extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->import('Database');
    }
    public function run()
    {
        //Check for update to C3.2
        if ($this->Database->tableExists('tl_module'))
        {
            $arrFields = $this->Database->listFields('tl_module');
            $blnDone = false;
            
            //check for one table and field
            foreach ($arrFields as $arrField)
            {
                if ($arrField['name'] == 'srl_css_file' && $arrField['type'] != 'varchar')
                {
                    $blnDone = true;
                }
            }
            // Run the version 3.2 update in two tables
            if ($blnDone == false)
            {
                Database\Updater::convertSingleField('tl_module', 'srl_css_file');
            }
            
        }
        
    }
}

if (version_compare(VERSION,'3.2','>=')) 
{ 
    $srlayerRunonceJob = new srlayerRunonceJob();
    $srlayerRunonceJob->run();  
}
