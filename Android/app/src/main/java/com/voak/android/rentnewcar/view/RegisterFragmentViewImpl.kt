package com.voak.android.rentnewcar.view

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.EditText
import androidx.fragment.app.Fragment
import com.voak.android.rentnewcar.MyApplication
import com.voak.android.rentnewcar.R
import com.voak.android.rentnewcar.di.components.DaggerRegisterFragmentComponent
import com.voak.android.rentnewcar.di.modules.RegisterFragmentModule
import com.voak.android.rentnewcar.presenter.RegisterFragmentPresenter
import javax.inject.Inject

class RegisterFragmentViewImpl : Fragment(), RegisterFragmentView {

    private lateinit var loginEditText: EditText
    private lateinit var passwordEditText: EditText
    private lateinit var nameEditText: EditText
    private lateinit var surnameEditText: EditText
    private lateinit var fatherNameEditText: EditText
    private lateinit var phoneEditText: EditText
    private lateinit var addressEditText: EditText
    private lateinit var registerButton: Button
    private lateinit var backButton: Button

    @Inject lateinit var presenter: RegisterFragmentPresenter
    private lateinit var callback: NavigationCallback

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        DaggerRegisterFragmentComponent.builder()
            .appComponent(MyApplication.instance.getAppComponent())
            .registerFragmentModule(RegisterFragmentModule(this))
            .build()
            .inject(this)
    }

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view = inflater.inflate(R.layout.register_fragment, container, false)


        loginEditText = view.findViewById(R.id.register_login_edit_text)
        passwordEditText = view.findViewById(R.id.register_password_edit_text)
        nameEditText = view.findViewById(R.id.name_edit_text)
        surnameEditText = view.findViewById(R.id.surname_edit_text)
        fatherNameEditText = view.findViewById(R.id.father_name_edit_text)
        phoneEditText = view.findViewById(R.id.phone_edit_text)
        addressEditText = view.findViewById(R.id.address_edit_text)
        registerButton = view.findViewById(R.id.register_button)
        backButton = view.findViewById(R.id.back_button)

        backButton.setOnClickListener {
            presenter.onBackButtonClicked()
        }

        return view
    }

    override fun navigateToLoginFragment() {
        callback.onBackButtonClicked()
    }

    public fun setNavigationCallback(callback: NavigationCallback) {
        this.callback = callback
    }

    interface NavigationCallback {
        fun onBackButtonClicked()
        fun onRegisterButtonClicked()
    }

}