package com.voak.android.rentnewcar.presenter

import com.voak.android.rentnewcar.repository.HistoryFragmentRepository
import com.voak.android.rentnewcar.view.HistoryFragmentView

class HistoryFragmentPresenterImpl(
    val view: HistoryFragmentView,
    val repository: HistoryFragmentRepository
) : HistoryFragmentPresenter {

}