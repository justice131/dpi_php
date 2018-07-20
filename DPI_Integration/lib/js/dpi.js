/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function index_level(index,type){
    if(type == "dei"){
        if(index <= 0.7){
            return "dei_low.png"
        }else if(index <= 0.8){
            return "dei_middle.png";
        }else{
            return "dei_high.png";
        }
    }else{
        if(index <= 0.25){
            return type+"_low.png";
        }else if(index <= 0.4){
            return type+"_middle.png";
        }else{
            return type+"_high.png";
        }
    }
}