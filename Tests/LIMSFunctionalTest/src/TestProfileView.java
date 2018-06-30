import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.Select;

public class TestProfileView {
    public void profileView(){

        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        //to view members the user should be either an it head or admin
        username.sendKeys("f");
        password.sendKeys("pass");
        loginBtn.click();

        driver.get("http://localhost/LIMS_V3.1/View/viewProfile.php");

        try{
            WebElement view =driver.findElement(By.id("profile")); //  add "profile" id to the  view ViewProfile.php
            System.out.println("TEST VIEW PROFILE PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST VIEW PROFILE FAILED");

        }
        driver.close();
    }
}
