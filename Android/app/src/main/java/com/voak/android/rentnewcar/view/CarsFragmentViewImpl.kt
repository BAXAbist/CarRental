package com.voak.android.rentnewcar.view

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import com.voak.android.rentnewcar.MyApplication
import com.voak.android.rentnewcar.R
import com.voak.android.rentnewcar.di.components.DaggerCarsFragmentComponent
import com.voak.android.rentnewcar.di.modules.CarsFragmentModule
import com.voak.android.rentnewcar.presenter.CarsFragmentPresenter
import javax.inject.Inject

class CarsFragmentViewImpl : Fragment(), CarsFragmentView {

    companion object {
        fun newInstance(): CarsFragmentViewImpl {
            return CarsFragmentViewImpl()
        }
    }

    @Inject lateinit var presenter: CarsFragmentPresenter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        DaggerCarsFragmentComponent.builder()
            .appComponent(MyApplication.instance.getAppComponent())
            .carsFragmentModule(CarsFragmentModule(this))
            .build()
            .inject(this)
    }

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view = inflater.inflate(R.layout.fragment_cars, container, false)

        return view
    }

}