/*
 *   Tsiyon Wuletaw
 *   section 2 SE
 *   ATR/0672/08
 */

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.Select;


public class TestLogin {

    WebDriver driver = new ChromeDriver();

    public void checkLogin(String inputUsername,String inputPassword){
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        username.sendKeys(inputUsername);
        password.sendKeys(inputPassword);
        loginBtn.click();
        try{
            WebElement header = driver.findElement(By.id("welcome"));
            System.out.println("TEST LOGIN PASSED");
        }
        catch (Exception e){
            System.out.println("TEST LOGIN FAILED");
        }
        driver.close();
    }

}