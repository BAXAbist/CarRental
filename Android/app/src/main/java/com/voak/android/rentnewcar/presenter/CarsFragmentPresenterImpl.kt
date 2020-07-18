package com.voak.android.rentnewcar.presenter

import com.voak.android.rentnewcar.repository.CarsFragmentRepository
import com.voak.android.rentnewcar.view.CarsFragmentView

class CarsFragmentPresenterImpl(
    val view: CarsFragmentView,
    val repository: CarsFragmentRepository
) : CarsFragmentPresenter
{

}