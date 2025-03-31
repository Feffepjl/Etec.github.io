package com.example.view;

import java.io.IOException;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.List;

import com.example.dao.UserDAO;
import com.example.model.User;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.text.Text;
import javafx.stage.Stage;

public class MenuController {
    private final UserDAO userDAO;
    private String currentUserEmail;

    @FXML
    private Text welcomeText;

    @FXML
    private TableView<User> userTable;

    @FXML
    private TableColumn<User, Integer> idColumn;

    @FXML
    private TableColumn<User, String> emailColumn;

    @FXML
    private TableColumn<User, String> createdAtColumn;

    @FXML
    private Text statusText;

    public MenuController() {
        this.userDAO = new UserDAO();
    }

    @FXML
    public void initialize() {
        setupTableColumns();
        loadUsers();
        updateStatus("Ready");
    }

    private void setupTableColumns() {
        idColumn.setCellValueFactory(new PropertyValueFactory<>("id"));
        emailColumn.setCellValueFactory(new PropertyValueFactory<>("email"));
        createdAtColumn.setCellValueFactory(new PropertyValueFactory<>("createdAt"));
    }

    public void setCurrentUser(String email) {
        this.currentUserEmail = email;
        welcomeText.setText("Welcome, " + email);
    }

    @FXML
    private void handleRefresh() {
        loadUsers();
        updateStatus("Table refreshed at " + getCurrentTime());
    }

    @FXML
    private void handleLogout() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/login.fxml"));
            Parent root = loader.load();
            
            Stage stage = (Stage) userTable.getScene().getWindow();
            Scene scene = new Scene(root, 400, 300);
            stage.setScene(scene);
            stage.setTitle("Login System");
            
            updateStatus("Logged out successfully");
        } catch (IOException e) {
            e.printStackTrace();
            updateStatus("Error during logout");
        }
    }

    private void loadUsers() {
        List<User> users = userDAO.getAllUsers();
        ObservableList<User> userList = FXCollections.observableArrayList(users);
        userTable.setItems(userList);
    }

    private void updateStatus(String message) {
        statusText.setText(message);
    }

    private String getCurrentTime() {
        return LocalDateTime.now().format(DateTimeFormatter.ofPattern("HH:mm:ss"));
    }
} 