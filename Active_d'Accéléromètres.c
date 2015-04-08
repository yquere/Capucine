void TD_USER_Setup(void)
{    
    // accelerometer initialization
    TD_ACCELERO_Init();

    // start to sample the data
    TD_ACCELERO_MonitorData(true,   // Monitoring enabled
            true,                   // Low-power mode enable
            TD_ACCELERO_10HZ,       // Sampling rate 10 Hz
            TD_ACCELERO_ALL_AXIS,   // Axis mask: all axis
            TD_ACCELERO_2G,         // Scale 2 g
            1,                      // High-pass filter enable
            TD_ACCELERO_STREAM,     // FIFO stream mode
            5,                      // Look like a call after 5 values so half a second
            AcceleroCallback);      // User defined callback function
}
