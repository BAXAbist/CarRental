package com.voak.android.rentnewcar.repository

import com.voak.android.rentnewcar.model.Car

interface CarItemFragmentRepository {
    fun getCar(carId: Int, resultOk: (Car) -> Unit, resultError: (String) -> Unit)
}