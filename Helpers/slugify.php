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
            if ( $kount > 1 ):
                $match = [];
                if ( preg_match('/^(.+)(-\d+)$/',$slug,$match) ):
                    $pos = strrpos($slug,$match[2]);
                    $len = strlen($match[2]);
                    $slug = substr_replace($slug,"-$kount",$pos,$len);
                endif;
            else:
                $slug = $slug.'-'.$kount;
            endif;
        }
        return $slug;
    }
}
