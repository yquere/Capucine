#include "config.h"
#include <efm32.h>
#include <em_cmu.h>
#include <em_adc.h>
#include <em_rmu.h>
#include <td_core.h>
#include <td_geoloc.h>
#include <nmea_parser.h>

#include <stdint.h>
#include <stdbool.h>

#include <td_config.h>

static void GPSFix(TD_GEOLOC_Fix_t *fix, bool timeout)
{
    // Fix type is giving what level of information did we get
    // from the GPS system. Quality is indicating the precision of the 
    // given information. > 1000 is bad, < 1000 is acceptable, < 500 is good
    // <200 is excellent. 
    if (fix->type >= TD_GEOLOC_2D_FIX && fix->quality.hdop < 500 ) {
	lastLatitude = fix->position.latitude;
	lastLongitude = fix->position.longitude;
	TD_GEOLOC_StopFix(TD_GEOLOC_HW_BCKP);
    }
    if ( timeout ) {
	TD_GEOLOC_StopFix(TD_GEOLOC_HW_BCKP);
    }
}

void TD_USER_Setup(void)
{
   // Set the device as a Sensor transmitter
   TD_SENSOR_Init(SENSOR_TRANSMITTER, 0, 0);
   
   // Launch a GPS capture request with a timeout of 120s
   // The callback function is GPSFix.
   TD_GEOLOC_TryToFix(TD_GEOLOC_NAVIGATION, 120, GPSFix); 
}

void TD_USER_Loop(void)
{
   TD_GEOLOC_Process();
}
