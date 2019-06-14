// Check of the function exists
if( !function_exists('slugify') ){
    // Pass in the class and string
    function slugify( $cls, $str ){
        $slug = str_slug( $str );
        $kount = 0;
        
        // Creates an instance of the class
        $object = new $cls();
        
        // The loop enhances uniqueness
        while($object->where('slug',$slug)->first()){
            $kount++;
            $slug = $slug.'-'.$kount;
        }
        return $slug;
    }
}
