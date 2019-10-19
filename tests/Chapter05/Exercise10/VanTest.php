<?php

namespace Chapter05\Exercise10;

class VanTest
{
    // The Van class cannot be tested because the execution of if would stop the PHP engine with an error like this:
    // "PHP Fatal error:  Class Van may not inherit from final class (Car)"
    // which is exactly what the Exercise is intended to show.
}
