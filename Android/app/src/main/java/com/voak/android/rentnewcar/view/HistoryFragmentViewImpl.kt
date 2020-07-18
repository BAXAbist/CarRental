package com.voak.android.rentnewcar.view

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import com.voak.android.rentnewcar.MyApplication
import com.voak.android.rentnewcar.R
import com.voak.android.rentnewcar.di.components.DaggerHistoryFragmentComponent
import com.voak.android.rentnewcar.di.modules.HistoryFragmentModule
import com.voak.android.rentnewcar.presenter.HistoryFragmentPresenter
import javax.inject.Inject

class HistoryFragmentViewImpl : Fragment(), HistoryFragmentView {

    companion object {
        fun newInstance(): HistoryFragmentViewImpl {
            return HistoryFragmentViewImpl()
        }
    }

    @Inject lateinit var presenter: HistoryFragmentPresenter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        DaggerHistoryFragmentComponent.builder()
            .appComponent(MyApplication.instance.getAppComponent())
            .historyFragmentModule(HistoryFragmentModule(this))
            .build()
            .inject(this)
    }

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view = inflater.inflate(R.layout.fragment_history, container, false)

        return view
    }
}