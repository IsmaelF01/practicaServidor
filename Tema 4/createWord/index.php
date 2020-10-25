<?php
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\Shared\Converter;


$vendorDirPath = realpath(__DIR__ . '/vendor');
if (file_exists($vendorDirPath . '/autoload.php')) {
    require $vendorDirPath . '/autoload.php';
} else {
    throw new Exception(
        sprintf(
            'Could not find file \'%s\'. It is generated by Composer. Use \'install --prefer-source\' or \'update --prefer-source\' Composer commands to move forward.',
            $vendorDirPath . '/autoload.php'
        )
    );
}

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();

$subsequent = $section->addHeader();
$subsequent->addText('Mojácar - 2020');


// Adding Text element with font customized inline...
$section->addText(
    'CURRICULUM VITAE',
    array('name' => 'Tahoma', 'size' => 18, 'color' => 'AABBFF', 'bold' => true)
);

$section->addText(
    'Javier Guillén Benavente',
    array('name' => 'Tahoma', 'size' => 12)
);

$section->addText(
    'Soy Ingeniero en Informática por la Universidad de Murcia '.
    'con 6 años de experiencia como programador Java. '.
    'actualmente trabajo como profesor o algo que se le parece.',
    array('name' => 'Ubuntu', 'size' => 10)
);

//Absolute positioning
$section->addImage(
    'img/imagen1.png',
    array(
        'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(3),
        'height'           => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(3),
        'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
        'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_RIGHT,
        'posHorizontalRel' => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
        'posVerticalRel'   => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
        'marginLeft'       => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(5.5),
        'marginTop'        => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(5.55),
    )
);

$wrappingStyle = 'square';
$section->addImage(
    'img/imagen1.png',
    array(
        'positioning'        => 'relative',
        'marginTop'          => -1,
        'marginLeft'         => 10,
        'width'              => 80,
        'height'             => 80,
        'wrappingStyle'      => $wrappingStyle,
        'wrapDistanceRight'  => Converter::cmToPoint(3),
        'wrapDistanceBottom' => Converter::cmToPoint(3),
    )
);


// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');
