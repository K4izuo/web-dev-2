<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $variant;
    public $size;
    
    public function __construct($variant = 'default', $size = 'default')
    {
        $this->variant = $variant;
        $this->size = $size;
    }
    
    public function render()
    {
        return view('components.button');
    }
    
    public function classes()
    {
        $baseClasses = 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50';
        
        $variants = [
            'default' => 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
            'destructive' => 'bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90',
            'outline' => 'border border-input bg-transparent shadow-sm hover:bg-accent hover:text-accent-foreground',
        ];
        
        $sizes = [
            'default' => 'h-9 px-4 py-2',
            'sm' => 'h-8 rounded-md px-3 text-xs',
            'lg' => 'h-10 rounded-md px-8',
        ];
        
        return $baseClasses . ' ' . 
               ($variants[$this->variant] ?? $variants['default']) . ' ' . 
               ($sizes[$this->size] ?? $sizes['default']);
    }
}