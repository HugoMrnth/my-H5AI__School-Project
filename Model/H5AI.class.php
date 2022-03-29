<?php

use function PHPSTORM_META\type;

    class H5AI {
       private $_tree;
       private $_path;

        public function  __construct($path) {
        $this->_tree = [];
        $this->_path = $path;
        }
        public function getTree() {
            return $this->_tree;
        }
        public function getPath() {
            return $this->_path;
        }

        public function getFiles($fileList, &$folder, $r = false, &$sizefolder = [], &$dateArr = []) {
            
            $scanArr = scandir($fileList);
            if($scanArr == true) {
                foreach($scanArr as $scan){
                    if($scan[0] == ".") {
                        continue;
                    }
                    if(is_file($fileList . "/" . $scan)) {

                    
                        array_push($folder, $scan);
                        array_push($sizefolder, filesize($fileList . '/' . $scan));
                        array_push($dateArr, date("F d Y H:i:s", filemtime($fileList . "/" . $scan)));
    
                    }
                    if(is_dir($fileList . "/" . $scan)) {
                        $newArr = [];
                        $newArr['path']= $fileList . "/" . $scan;
                        $folder[$scan] = $newArr ;
                        if($r == true) {
                            $this->getFiles($fileList . "/" . $scan, $folder[$scan], $r);
                        }
                        
                    }
                }   
            }
            
        }

        

        public function tree($arr) {
            echo "<ul>";
            foreach($arr as $key => $value) {
                    if(is_array($value)) {
                        $path = "$value[path]";
                        echo "<li class='li'><i class='fa fa-folder  text-warning'></i><a href=/$path>$key</a>";
                        $this->tree($value);
                    } else {
                            if(substr($value, 0, 2) !== './' AND !is_int($value)) {
                                $icone = $this->typeOfFile($value);
                                echo "<li class=''>$icone</i>$value";                        
                            }                            
                    }
                }
                echo "</li></ul>";

        }

        public function typeOfFile($value) {
            $type = explode(".", $value);
           
            switch($type[1]) {
                case 'jpg': 
                    return "<i class='fa fa-file-image-o text-dark'></i>";
                    break;
                case 'png': 
                    return "<i class='fa fa-file-image-o text-dark'></i>";
                    break;
                case 'html':
                    return "<i class='fa fa-html5 text-orange'></i>"; 
                    break;
                case 'css': 
                    return "<i class='fa fa-css3 text-primary'></i>"; 
                    break;
                case 'php':
                    return "<i class='fa fa-php text-violet'></i>"; 
                    break;
                case 'class':
                    return "<i class='fa fa-php text-violet'></i>"; 
                    break;
                case 'txt': 
                    return "<i class='fa fa-file-text text-dark'></i>"; 
                    break;
                case 'js': 
                    return "<i class='fa fa-file-code-o text-warning'></i>"; 
                    break;
                default:
                    return "<i class='fa fa-file text-dark'></i>"; 
    
            }
            
        }


        public function textModal($uri, $value, $name) {
            $inside = file_get_contents($uri . '/' . $value);
            echo "<div class='modal' id=$name>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title'>$value</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  <p>$inside</p>
                </div>
              </div>
            </div>
          </div>";

        }


        public function table($arr, $sizefolder, $dateArr, $uri) {
            foreach($arr as $key => $value) {
                static $i = 0;
                echo "<tr>";
                if(is_array($value)) {
                    $path = "$value[path]";
                    echo "<td class='li'><i class='fa fa-folder text-warning'></i><a href=/$path>$key</a></td>";                    
                    // $this->tree($value, $key . "/");
                    
                } else {
                    if(substr($value, 0, 2) !== './' AND !is_int($value)) {
                        $icone = $this->typeOfFile($value);
                        $type = explode(".", $value);
                        if($type[1] === 'txt') {
                            $this->textModal($uri, $value, $type[0]);
                            echo  "<td class='link' data-target='$type[0]'>$icone</i>$value</td>";
                            echo  "<td class=''>" . $sizefolder[$i] / 100 . " ko</td>";
                            echo  "<td class=''>$dateArr[$i]</td>";
                        } else {
                            echo  "<td class=''>$icone</i>$value</td>";
                            echo  "<td class=''>" . $sizefolder[$i] / 100 . " ko</td>";
                            echo  "<td class=''>$dateArr[$i]</td>";
                        }
                        
                    }
                    $i++;                            
                }
            }
            echo "</tr>";
        }
    }


    