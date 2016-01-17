<?php

class Student
{
    public function __construct() {
        // allocate your stuff
    }

    public static function withID( $id ) {
        $instance = new self();
        $instance->loadByID( $id );
        return $instance;
    }

    public static function withRow( array $row ) {
        $instance = new self();
        $instance->fill( $row );
        return $instance;
    }

    protected function loadByID( $id ) {
        // do query
        $row = my_awesome_db_access_stuff( $id );
        $this->fill( $row );
    }

    protected function fill( array $row ) {
        // fill all properties from array
    }
}

?>

I'd probably do something like this:

<?php

class Student
{
    public function __construct() {
        // allocate your stuff
    }

    public static function withID( $id ) {
        $instance = new self();
        $instance->loadByID( $id );
        return $instance;
    }

    public static function withRow( array $row ) {
        $instance = new self();
        $instance->fill( $row );
        return $instance;
    }

    protected function loadByID( $id ) {
        // do query
        $row = my_awesome_db_access_stuff( $id );
        $this->fill( $row );
    }

    protected function fill( array $row ) {
        // fill all properties from array
    }
}


//Then if i want a Student where i know the ID:

$student = Student::withID( $id );

//Or if i have an array of the db row:

$student = Student::withRow( $row );
//Technically you're not building multiple constructors,
// just static helper methods, but you get to avoid a lot
// of spaghetti code in the constructor this way.
