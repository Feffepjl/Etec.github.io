package com.example.controller;

import com.example.dao.UserDAO;
import com.example.model.User;

public class LoginControllerLogic {
    private final UserDAO userDAO;

    public LoginControllerLogic() {
        this.userDAO = new UserDAO();
    }

    public boolean login(String email, String password) {
        User user = new User(email, password);
        return userDAO.authenticateUser(user);
    }

    public boolean register(String email, String password) {
        User user = new User(email, password);
        return userDAO.registerUser(user);
    }
} 