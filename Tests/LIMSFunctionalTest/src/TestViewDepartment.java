import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;

public class TestViewDepartment {
    public void viewDepartment(){

        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        //to view department the user should be either an IT head or admin
        //and f is an IT head
        username.sendKeys("f");
        password.sendKeys("pass");
        loginBtn.click();

        driver.get("http://localhost/LIMS_V3.1/View/viewDepartment.php");

        try{
            WebElement view =driver.findElement(By.id("department")); // add "department" id to the view in  ViewDepartment.php
            System.out.println("TEST DEPARTMENT PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST DEPARTMENT FAILED");

        }
        driver.close();
    }
}
