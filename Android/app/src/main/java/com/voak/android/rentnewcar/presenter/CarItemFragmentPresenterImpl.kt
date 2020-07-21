package com.voak.android.rentnewcar.presenter

import com.voak.android.rentnewcar.repository.CarItemFragmentRepository
import com.voak.android.rentnewcar.view.CarItemFragmentView

class CarItemFragmentPresenterImpl(
    val view: CarItemFragmentView,
    val repository: CarItemFragmentRepository
) : CarItemFragmentPresenter {

    override fun onCreateView(carId: Int) {
        view.hideAllViews()
        view.showProgress()
        repository.getCar(
            carId,
            {
                /// ЗАПОЛНИТЬ ВЬЮХИ
                view.setCarBrand(it.brand)
                view.setCarPrice(it.price)
                view.setCarImage(it.imageUrl)
                view.setPassengersCount(it.passengers)
                view.setBagsCount(it.bags)
                view.setDoorsCount(it.doors)
                /// Доделать дату и общую стоимость


                view.showAllViews()
                view.hideProgress()
            },
            {
                view.hideProgress()

            }
        )
    }
}