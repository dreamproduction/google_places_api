<?php

use GooglePlaceAutocomplete\Component\Country;
use GooglePlaceAutocomplete\Parameter\Components;
use Markenwerk\Iso3166Country\Iso3166CountryInformation;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \GooglePlaceAutocomplete\Paramter\Components
 */
class ComponentsTest extends TestCase {

  /**
   * @covers ::addComponent
   * @covers ::__toString
   */
  public function testToString() {
    $components = new Components();

    $country = Iso3166CountryInformation::getByIso3166Alpha2('FR');
    $countryComponent = new Country($country);
    $components->addComponent($countryComponent);
    
    $country = Iso3166CountryInformation::getByIso3166Alpha2('ES');
    $countryComponent = new Country($country);
    $components->addComponent($countryComponent);

    $this->assertEquals('country:fr,country:es', (string) $components);
  }

}
