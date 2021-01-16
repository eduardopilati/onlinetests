class Loader {
    active = false;

    show(){
        if(!this.active){
            $('.loader').fadeIn('fast');
            this.active = true;
        }
    }

    hide(){
        if(this.active){
            $('.loader').fadeOut('fast');
            this.active = false;
        }
    }
}

let loader = new Loader();
