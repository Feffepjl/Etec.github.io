package com.example.view;

import java.io.IOException;

import com.example.controller.LoginControllerLogic;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

public class LoginController {
    private final LoginControllerLogic loginControllerLogic;

    @FXML
    private TextField emailField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private Label messageLabel;

    public LoginController() {
        this.loginControllerLogic = new LoginControllerLogic();
    }

    @FXML
    private void handleLogin() {
        String email = emailField.getText();
        String password = passwordField.getText();

        if (email.isEmpty() || password.isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Input Error", "Please fill in all fields");
            return;
        }

        if (loginControllerLogic.login(email, password)) {
            navigateToMenu(email);
        } else {
            showAlert(Alert.AlertType.ERROR, "Error", "Login failed. Invalid credentials.");
        }
    }

    @FXML
    private void handleRegister() {
        String email = emailField.getText();
        String password = passwordField.getText();

        if (email.isEmpty() || password.isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Input Error", "Please fill in all fields");
            return;
        }

        if (loginControllerLogic.register(email, password)) {
            showAlert(Alert.AlertType.INFORMATION, "Success", "Registration successful! Please login.");
            clearFields();
        } else {
            showAlert(Alert.AlertType.ERROR, "Error", "Registration failed. Email might already exist.");
        }
    }

    private void navigateToMenu(String email) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/menu.fxml"));
            Parent root = loader.load();
            
            MenuController menuController = loader.getController();
            menuController.setCurrentUser(email);
            
            Stage stage = (Stage) emailField.getScene().getWindow();
            Scene scene = new Scene(root, 800, 600);
            stage.setScene(scene);
            stage.setTitle("User Management System");
            
        } catch (IOException e) {
            e.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Error", "Failed to load menu screen.");
        }
    }

    private void clearFields() {
        emailField.clear();
        passwordField.clear();
    }

    private void showAlert(Alert.AlertType type, String title, String content) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
} 